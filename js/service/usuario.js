addService({
    usuario: function($location,db) {

    	var service = {
        	accedio:false,
            chekear:function(){
                
                if(localStorage.usuario != undefined){

                    service.info = angular.fromJson(localStorage.usuario);

                    service.accedio = true;

                }

            },
        	acceder:function(nombre, clave, done){
        		db.post("php/acceso.php",{user:nombre,clave:clave},function(data){
                    console.log(data);
        			if(data.cod_usuario != undefined){

                        service.info = data;

                        done&&done();

                        service.accedio = true;

                        service.guardar();

                        $location.path("/inicio");
        				
        			}else{
                        switch (data.error[0]){
                            case 'NULL':
                                alert("El nombre de usuario o la clave no coincide.");
                                break;
                            case 'BAN':
                                alert("Usuario bloqueado, comuniquese con el administrador!");
                                break;
                            case 'USER':
                                alert(data.error[1]);
                                break;
                            case 'CLAVE':
                                alert(data.error[1]);
                                break;
                            default:
                                alert("Ocurrio un inconveniente al intentar conectar!");
                                break;
                        }

                    }
        			
        		});
        		
        	},
            guardar:function(){

                localStorage.usuario = angular.toJson(service.info);
                
            },
        	logout:function(){

                delete localStorage.usuario;

                delete service.info;

                db.post("php/salir.php",{},function(){
                    
                });

                service.accedio = false;

                $location.path("/inicio");
        		
        	}
        };

        return service;
    }
});