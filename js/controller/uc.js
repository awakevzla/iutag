addController({
    verUc:function($scope,array,db,ucs){

        $scope.ucs = ucs;

        $scope.eliminar = function(uc){

            if(confirm("Esta seguro de que desea eliminar esta uc:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarUc.php",uc,function(data){

                    if(data.cod_uc > 0)
                        array.remove(ucs,uc);
                    else
                        alert("El uc no se pudo eliminar, debe removela de todos las cargas antes de borrarlo.")
                })
            
        }

    },
    modificarUc:function($scope,$location,db,uc){

        $scope.nuevo = uc;

        $scope.trimeste_anterior = {nro_semanas:uc.nro_semanas,cod_trimestre:uc.cod_trimestre};

        console.log($scope.trimeste_anterior);

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.crear = function(){

            var duracion = $scope.nuevo.nro_semanas;

            if(!$scope.nuevo.cod_trimestre){

                alert("Debe ingresar un trimestre.");

                return;

            }

            if(duracion){

                trimeste = $scope.nuevo.cod_trimestre-1;
                trayecto = $scope.nuevo.cod_trayecto-2;

                serie = trimeste - trayecto*3;

                if(trayecto < 0 && duracion > 12){

                    alert("Las unidades curriculares de trayecto inicial solo pueden durar 12 semanas");

                    return;

                }

                else

                if(duracion == 36 && serie > 1){

                    alert("Las unidades curriculares que duran mas de 36 semanas deben comenzar en trimestre I");

                    return;

                }

                else

                if(duracion == 24 && serie > 2){

                    alert("Las unidades curriculares que duran mas de 24 semanas deben comenzar en trimestre I o II");

                    return;

                }

                $scope.nuevo.cantidad = duracion / 12;

            }

            return;

            db.post("php/crearUC.php",$scope.nuevo,function(data){

                if(!!data && !!data.cod_uc){

                    if($scope.accion == "nuevo"){

                        $scope.nuevo = {};

                        delete $scope.accion;

                        delete $scope.trimestre;

                    }else{

                        $location.path("/ucs/");

                    }

                }
                
            });

        }

        $scope.semanas = [12,24,36];

    },
    uc:function($scope,$location,db){

    	$scope.nuevo = {};

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.crear = function(){

        	var duracion = $scope.nuevo.nro_semanas;

        	if(!$scope.nuevo.cod_trimestre){

        		alert("Debe ingresar un trimestre.");

        		return;

        	}

        	if(duracion){

        		trimeste = $scope.nuevo.cod_trimestre-1;
        		trayecto = $scope.nuevo.cod_trayecto-2;

        		serie = trimeste - trayecto*3;

        		if(trayecto < 0 && duracion > 12){

        			alert("Las unidades curriculares de trayecto inicial solo pueden durar 12 semanas");

        			return;

        		}

        		else

        		if(duracion == 36 && serie > 1){

        			alert("Las unidades curriculares que duran mas de 36 semanas deben comenzar en trimestre I");

        			return;

        		}

        		else

        		if(duracion == 24 && serie > 2){

        			alert("Las unidades curriculares que duran mas de 24 semanas deben comenzar en trimestre I o II");

        			return;

        		}

        		$scope.nuevo.cantidad = duracion / 12;

        	}

        	db.post("php/crearUC.php",$scope.nuevo,function(data){

        		if(!!data && !!data.cod_uc){

        			if($scope.accion == "nuevo"){

        				$scope.nuevo = {};

        				delete $scope.accion;

                        delete $scope.trimestre;

        			}else{

        				$location.path("/ucs/");

        			}

        		}
        		
        	});

        }

        $scope.semanas = [12,24,36];

        $scope.otro = function(){
            
            $scope.accion = "nuevo";

        }

    }

});