addController({
    usuarios:function($scope,array,db,usuarios,usuario){

        $scope.usuarios = usuarios;

        $scope.eliminar = function(usuario){

            if(confirm("Esta seguro de que desea eliminar este usuario:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarUsuario.php",usuario,function(data){

                    if(data.cod_usuario != undefined)
                        array.remove(usuarios,usuario);
                    else
                        alert("El usuario no se pudo eliminar")
                })
            
        }
        
    },
    usuarios:function($scope,array,db,usuarios,usuario){

        $scope.usuarios = usuarios;

        $scope.desbanear = function(usuario){

            console.log(usuario);
            data_ch = {};
            data_ch["cod_usuario"]=usuario.cod_usuario;
            data_ch["intentos"]=0;
            data_ch["baneado"]=0;
            console.log(data_ch);
            if(confirm("¿Esta seguro de desbloquear éste usuario?"))
                db.post("php/desbloquearUsuario.php",data_ch,function(data){

                    console.log(data);
                })

        }

    },
    usuario:function($scope,$location,db,usuario){

    	$scope.nuevo = usuario;

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.tipos = [{text:"Administrador",value:"administrador"},{text:"Operador",value:"operador"}]
        
        $scope.crear = function(){

            if($scope.formulario.$valid == false){

                return;

            }

            if(!!$scope.nuevo.cod_usuario){
                db.post("php/modificarUsuario.php",$scope.nuevo,function(data){
                    
                    if($scope.formulario.$valid == false){

                        return;

                    }

                    if(!!data && !!data.cod_usuario){

                        $location.path("/usuarios/");

                    }

                    if(!!data.error){

                        if(data.error[0] == "23000"){

                            var error = data.error[1];

                            if(/UQ_usuario_2/.test(error))
                                alert("Este nombre de usuario ya esta siendo utilizado, debe cambiarlo.");

                            if(/UQ_usuario_3/.test(error))
                                alert("Ya se ha registrado un usuario con este nro de cedula.");

                            if(/UQ_usuario_1/.test(error))
                                alert("Este usuario ya se ha registrado.");

                        }

                    };

                });
            }
            else
                db.post("php/crearUsuario.php",$scope.nuevo,function(data){
                    
                    if($scope.formulario.$valid == false){

                        return;

                    }

                    if(!!data && !!data.cod_usuario){

                        if($scope.accion == "nuevo"){

                            $scope.nuevo = {};

                            delete $scope.accion;

                        }else{

                            $location.path("/usuarios/");

                        }

                    }

                    if(!!data.error){

                        if(data.error[0] == "23000"){

                            var error = data.error[1];

                            if(/UQ_usuario_2/.test(error))
                                alert("Este nombre de usuario ya esta siendo utilizado, debe cambiarlo.");

                            if(/UQ_usuario_3/.test(error))
                                alert("Ya se ha registrado un usuario con este nro de cedula.");

                            if(/UQ_usuario_1/.test(error))
                                alert("Este usuario ya se ha registrado.");

                        }

                    };

                });

        }

        $scope.otro = function(){
            
            $scope.accion = "nuevo";

        }

    }
});