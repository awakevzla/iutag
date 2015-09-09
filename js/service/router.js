addService({

    routes:[
    '$location',
    '$route',
    '$templateCache',
    function($location,$route,$templateCache){
        
        return {

            remove:function(){

                angular.forEach($route.routes,function(e,index){

                    delete $route.routes[index];
                    
                });
                
            }

        }
    }]

});