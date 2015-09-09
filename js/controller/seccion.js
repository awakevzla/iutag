app.controller({
    verSecciones:function($scope,array,db,secciones){

        $scope.secciones = secciones;

        $scope.eliminar = function(seccion){

            if(confirm("Esta seguro de que desea eliminar esta seccion:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarSeccion.php",seccion,function(data){

                    if(data.cod_seccion != undefined)
                        array.remove(secciones,seccion);
                    else
                        alert("El seccion no se pudo eliminar.")
                })
            
        }

    },
    modificarSesion:function($scope,db,$location,seccion){

        $scope.nuevo = seccion;

        $scope.guardar = function () {

            console.log($scope);

            db.post("php/guardarSecciones.php",$scope.nuevo,function(data){

                console.log(data);
                
                if(!!data && data.cod_seccion != undefined){

                    $location.path("/secciones/");

                }

            });
            
        }

    },
    seccion:function($scope,db,$location,$routeParams){

    	$scope.nuevo = $routeParams;

        $scope.crear = function(){

            if($scope.formulario.$valid == false){

                return;

            }

            db.post("php/crearSecciones.php",$scope.nuevo,function(data){
                
                if(!!data && !!data.cod_seccion){

                    if($scope.accion == "nuevo"){

                        $scope.nuevo = {};

                        delete $scope.accion;

                    }else{

                        $location.path("/cargas/");

                    }

                }

            });

        }

    }
})