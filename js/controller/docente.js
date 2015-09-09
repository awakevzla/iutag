addController({
    verDocentes:function($scope,array,db,docentes){

        $scope.docentes = docentes;

        $scope.eliminar = function(docente){

            if(confirm("Esta seguro de que desea eliminar este docente:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarDocente.php",docente,function(data){

                    if(data.cod_docente != undefined)
                        array.remove(docentes,docente);
                    else
                        alert("El docente no se pudo eliminar");
                })
            
        }
        
    },
    verDocente:function($scope,docente){

        angular.extend($scope,docente);
        
    },
    docente:function($scope,$location,db,docente){

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.crear = function(){

            if($scope.formulario.$valid == false){

                return;

            }

            if(!!$scope.nuevo.cod_docente){
                db.post("php/modificarDocente.php",$scope.nuevo,function(data){
                    
                    if(!!data && !!data.cod_docente){

                        $location.path("/docentes/");

                    }

                    if(!!data.error){

                        if(data.error[0] == "23000"){

                            var error = data.error[1];

                            if(/UQ_docente_2/.test(error))
                                alert("Ya se ha registrado un docente con este nro de cedula.");

                            if(/UQ_docente_1/.test(error))
                                alert("Este docente ya se ha registrado.");

                        }

                    };

                });
            }
            else
            db.post("php/crearDocente.php",$scope.nuevo,function(data){
                
                if(!!data && !!data.cod_docente){

                    if($scope.accion == "nuevo"){

                        $scope.nuevo = {
                            nacionalidad : "Nac."
                        };

                        delete $scope.accion;

                    }else{

                        $location.path("/docentes/");

                    }

                }

                if(!!data.error){

                    if(data.error[0] == "23000"){

                        var error = data.error[1];

                        if(/UQ_docente_2/.test(error))
                            alert("Ya se ha registrado un docente con este nro de cedula.");

                        if(/UQ_usuario_1/.test(error))
                            alert("Este docente ya se ha registrado.");

                    }

                };

            });

        }

        $scope.otro = function(){
            
            $scope.accion = "nuevo";

        }

        $scope.nuevo = angular.extend({
            nacionalidad : "Nac."
        },docente);

        $scope.tipo_cedula = ["V","E","P"];

        $scope.condicion = ["fijo","contratado"];

        $scope.categoria = ["instructor","asistente","agregado","asociado","titular"];

        $scope.dedicacion = ["completo","exclusiva","convencional","medio"]

    }
});