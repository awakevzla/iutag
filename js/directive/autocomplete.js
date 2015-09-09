addDirective({
    autocompleteUrl:['array', 'db', '$timeout', function(array, db, $timeout){

        return {
            restrict:'A',
            scope:{
                render : "@autocompleteRender",
                url : "@autocompleteUrl",
                data : "=ngModel",
                set : "=autocompleteSet",
                otro : "=autocompleteOtro",
                add : "=autocompleteAdd"
            },
            link : function(scope, elem, attr){

                var source = [],
                delay,
                setValue,
                type = {
                    trimestre :{

                        render:function( ul, item ) {
                            return $("<li>").append(
                                $("<a>")
                                .append($("<div>").append("Trayecto: "+item.trayecto))
                                .append($("<div>").append("Trimestre: "+item.trimestre))
                            )
                            .appendTo( ul );
                        },
                        onSelect:function(e,item){

                            scope.$apply(function(){

                                scope.data = setValue = "Trayecto "+item.item.trayecto+" Trimestre "+item.item.trimestre;
                                scope.set = item.item.cod_trimestre;
                                scope.otro = item.item.cod_trayecto;
                                
                            });

                            return false
                            
                        }

                    },
                    docente :{

                        render:function( ul, item ) {
                            return $("<li>").append(
                                $("<a>")
                                .append($("<div>").append("Nombre: "+item.nombre+" "+item.apellido))
                                .append($("<div>").append("Cedula: "+item.nacionalidad+"-"+item.cedula))
                            )
                            .appendTo( ul );
                        },
                        onSelect:function(e,item){

                            scope.$apply(function(){

                                scope.data = setValue = item.item.nombre+" "+item.item.apellido;
                                scope.set = item.item.cod_docente;
                                scope.otro = item.item.asignaciones;
                                
                            });

                            return false
                            
                        }

                    },
                    aula :{

                        render:function( ul, item ) {
                            return $("<li>").append(
                                $("<a>")
                                .append($("<div>").append("Nombre: "+item.nombre+" | "+item.tipo))
                                .append($("<div>").append("Capacidad: "+item.capacidad))
                            )
                            .appendTo( ul );
                        },
                        onSelect:function(e,item){

                            scope.$apply(function(){

                                scope.data = setValue = item.item.nombre;
                                scope.set = item.item.cod_aula;
                                
                            });

                            return false
                            
                        }

                    }
                },
                options=type[scope.render];

                scope.$watch("data",function(novo, oldo){

                    if(scope.set != undefined && scope.set != undefined && oldo === setValue && novo != setValue){

                        scope.set = undefined;

                        scope.data = undefined;

                    }

                    if(novo === oldo || novo === undefined || setValue === novo)
                        return;

                    $timeout.cancel(delay);

                    delay = $timeout(function(){

                        var search = {search : scope.data};

                        if(!!scope.add){

                            angular.extend(search,scope.add);

                        }

                        console.log(search);
                    
                        db.post(scope.url, search, function(data){

                            $(elem).autocomplete("option", "source", data).autocomplete("search", scope.data);

                        });

                    },200);

                });

                $(elem).autocomplete({
                    minLength: 0,
                    select:options.onSelect,
                    focus:function(){
                        return false;
                    }
                }).autocomplete( "instance" )._renderItem = options.render;
                
            }
        }
    }]
}); 