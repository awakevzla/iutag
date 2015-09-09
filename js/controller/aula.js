app.controller({
    verAulas:function($scope,array,db,aulas){

        $scope.aulas = aulas;

        $scope.eliminar = function(aula){

            if(confirm("Esta seguro de que desea eliminar esta aula:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarAula.php",aula,function(data){

                    if(data.cod_aula != undefined)
                        array.remove(aulas,aula);
                    else
                        alert("El aula no se pudo eliminar, debe removela de todos las cargas antes de borrarlo.")
                })
            
        }

    },
    verAula:function($scope,aula){

        angular.extend($scope,aula);

    },
    aula:function($scope,db,$location,aula){

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.nuevo = aula;

    	$scope.tipos = ["laboratorio","aula"];

        $scope.otro = function(){
            
            $scope.accion = "nuevo";

        }

        $scope.crear = function(){

        	if($scope.formulario.$valid == false){

        		return;

        	}
        	
            if(!!$scope.nuevo.cod_aula){
                db.post("php/modificarAula.php",$scope.nuevo,function(data){
                    
                    if(!!data && !!data.cod_aula){

                        $location.path("/aulas/");

                    }

                });
            }else
        	db.post("php/crearAula.php",$scope.nuevo,function(data){

        		if(!!data && !!data.cod_aula){

                    if($scope.accion == "nuevo"){

                        $scope.nuevo = {};

                        delete $scope.accion;

                        return;

                    }

        			$location.path("/aulas/")

        		}

                if(!!data.error){

                    if(data.error[0] == "23000")
                        alert("Ya se ha creado un aula con este nombre.");

                };
        		
        	});

        }

    }
})