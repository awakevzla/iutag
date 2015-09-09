app.controller({
    verPeriodos:function($scope,array,db,periodos){

        $scope.periodos = periodos;

        $scope.eliminar = function(periodo){

            if(confirm("Esta seguro de que desea eliminar este periodo:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarPeriodo.php",periodo,function(data){

                    if(data.cod_periodo != undefined)
                        array.remove(periodos,periodo);
                    else
                        alert("El periodo no se pudo eliminar")
                })
            
        }

    },
    verPeriodo:function($scope,array,db,periodo){

        angular.extend($scope,periodo);

    },
    periodo:function($scope,db,$location,periodo){

        $scope.nuevo = periodo;

        $scope.crear = function(){

            if($scope.formulario.$valid == false){

                return;

            }

            if(!!$scope.nuevo.cod_periodo){
                db.post("php/modificarPeriodo.php",$scope.nuevo,function(data){
                    
                    if(!!data && !!data.cod_periodo){

                        $location.path("/periodos/");

                    }

                });
            }
            db.post("php/crearPeriodo.php",$scope.nuevo,function(data){
                
                if(!!data && !!data.cod_periodo){

                    if($scope.accion == "nuevo"){

                        $scope.nuevo = {};

                        delete $scope.accion;

                    }else{

                        $location.path("/periodos/");

                    }

                }

            });

        }

    }
})