addService({

    db: ['$http','$q',function($http,$q) {

        var actions = ["create","select","update","delete"], db = {

            post:function(url,data,success){
                
                $http.post(url,$.param(data),{
                        // Modifica el Header de la petición para 
                        headers:{'Content-Type':"application/x-www-form-urlencoded; charset=UTF-8"}
                    }
                ).success(function(data, status){

                    //console.log(data);

                    success(data,status);

                });

            },
            remove:function(field, value){

                var data={};

                data[field] = value;

                db.delete(field.replace("id_",""),data,function(data){
                    
                });

            },
            routerSelect:function(table,route){

                var cash = cache.getFromRouter(table,route);

                if(cash !== false)
                    return cash;

                return this.promise('select',table,route.current.params,function(data){

                    return data;

                });

            },
            promise:function(name){

                var defer = $q.defer(),last = arguments.length,done = arguments[arguments.length-1];

                arguments[arguments.length-1]=function(){

                    defer.resolve(done.apply(this,arguments));
                    
                }

                this[name].apply(this,Array.prototype.splice.apply(arguments,[1]));

                return defer.promise;
                
            },file : function(file, done){

                var formData = new FormData();

                formData.append('file', file);

                $http.post('script/uploadFile.php', formData, {

                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}

                })
                .success(function(data){

                    done.call(this,data);

                })
                .error(function(){
                });

            },cache:function(type,data){

                cache.add(type,data);
                
            }

        }

        for (var i = actions.length - 1; i >= 0; i--) {

            (function(action){
            
                db[action]=function(table){

                    arguments[1]={
                        data:angular.toJson(arguments[1]),
                        action:action
                    }

                    arguments[0]="./script/"+table+".php";

                    this.post.apply(this,arguments)
                    
                }
                
            })(actions[i])

        };

        return db;
    }]
    
});