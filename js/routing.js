app.config(['$routeProvider',
    function($routeProvider) {

        $routeProvider.

        // Inicio
        when('/inicio',{
            templateUrl: 'vistas/inicio.php'
        }).

        // Login
        when('/acceder',{
            templateUrl: 'vistas/acceder.php',
            controller:'acceder'
        }).

        // Clave
        when('/clave',{
            templateUrl: 'vistas/clave.php',
            controller: "clave"
        }).

        // Reportes
        when('/reportes',{
            templateUrl: 'vistas/reportes.php',
            controller: "reportes",
                resolve:{
                    usuarios:function($route,db,$q,$location,usuario){

                        if(usuario.info.tipo != "administrador"){
                            $location.path("/");
                        }

                        var deferred = $q.defer();

                        db.post("php/obtenerUsuarios.php",{},function(data){

                            deferred.resolve(data);

                        });

                        return deferred.promise;

                    }
                }
        }).

        // Imprimir
        when('/imprimir/aula-:cod_aula/:cod_periodo',{
            templateUrl: 'vistas/imprimirAula.php',
            controller: 'imprimir',
            resolve:{
                imprimir:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/imprimirAula.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/imprimir/requerido-:cod_periodo',{
            templateUrl: 'vistas/imprimirRequeridos.php',
            controller: 'imprimirVarios',
            resolve:{
                imprimir:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/imprimirRequeridos.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/imprimir/horarios-:cod_periodo',{
            templateUrl: 'vistas/imprimirHorarios.php',
            controller: 'imprimirVarios',
            resolve:{
                imprimir:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/imprimirHorarios.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/imprimir/docente-:cod_docente/:cod_periodo',{
            templateUrl: 'vistas/imprimirDocente.php',
            controller: 'imprimir',
            resolve:{
                imprimir:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/imprimirDocente.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Secciones
        when('/secciones/:cod_periodo',{
            templateUrl: 'vistas/seccion.php',
            controller: 'seccion'
        }).
        when('/secciones/',{
            templateUrl: 'vistas/secciones.php',
            controller: 'verSecciones',
            resolve:{
                secciones:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerSecciones.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/seccion/:cod_seccion',{
            templateUrl: 'vistas/modificarSesion.php',
            controller: 'modificarSesion',
            resolve:{
                seccion:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerSeccion.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Docentes
        when('/docente',{
            templateUrl: 'vistas/docente.php',
            controller: 'docente',
            resolve:{
                docente:function(){

                    return {};

                }
            }
        }).
        when('/docente/modificar/:cod_docente',{
            templateUrl: 'vistas/docente.php',
            controller: 'docente',
            resolve:{
                docente:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerDocente.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/docentes',{
            templateUrl: 'vistas/docentes.php',
            controller: "verDocentes",
            resolve:{
                docentes:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerDocentes.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/docente/:cod_docente',{
            templateUrl: 'vistas/verDocente.php',
            controller: "verDocente",
            resolve:{
                docente:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerDocente.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Cargas
        when('/carga/:cod_carga',{
            templateUrl: 'vistas/carga.php',
            controller: 'carga',
            resolve:{
                carga:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerCarga.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/cargas',{
            templateUrl: 'vistas/cargas.php',
            controller: 'verCargas',
            resolve:{
                cargas:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerCargas.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Aulas
        when('/aula',{
            templateUrl: 'vistas/aula.php',
            controller: "aula",
            resolve:{
                aula:function(){

                    return {}

                }
            }
        }).
        when('/aula/modificar/:cod_aula',{
            templateUrl: 'vistas/aula.php',
            controller: 'aula',
            resolve:{
                aula:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerAula.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/aula/:cod_aula',{
            templateUrl: 'vistas/verAula.php',
            controller: "verAula",
            resolve:{
                aula:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerAula.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/aulas',{
            templateUrl: 'vistas/aulas.php',
            controller: "verAulas",
            resolve:{
                aulas:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerAulas.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Usuarios
        when('/usuario',{
            templateUrl: 'vistas/usuario.php',
            controller: "usuario",
            resolve:{
                usuario:function($location,usuario){

                    if(usuario.info.tipo != "administrador"){
                        $location.path("/");
                    }

                    return {};

                }
            }
        }).
        when('/usuario/:cod_usuario',{
            templateUrl: 'vistas/usuario.php',
            controller: "usuario",
            resolve:{
                usuario:function($route,db,$q,$location,usuario){

                    if(usuario.info.tipo != "administrador"){
                        $location.path("/");
                    }
                    var deferred = $q.defer();

                    db.post("php/obtenerUsuario.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/usuarios',{
            templateUrl: 'vistas/usuarios.php',
            controller: "usuarios",
            resolve:{
                usuarios:function($route,db,$q,$location,usuario){

                    if(usuario.info.tipo != "administrador"){
                        $location.path("/");
                    }
                    
                    var deferred = $q.defer();

                    db.post("php/obtenerUsuarios.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Unidad Curriculo
        when('/uc',{
            templateUrl: 'vistas/uc.php',
            controller: "uc"
        }).
        when('/uc/:cod_uc',{
            templateUrl: 'vistas/uc.php',
            controller: "modificarUc",
            resolve:{
                uc:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerUc.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/ucs',{
            templateUrl: 'vistas/ucs.php',
            controller: "verUc",
            resolve:{
                ucs:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerUcs.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).

        // Periodo
        when('/periodo',{
            templateUrl: 'vistas/periodo.php',
            controller: "periodo",
            resolve:{
                periodo:function(){

                    return {};

                }
            }
        }).
        when('/periodo/ver/:cod_periodo',{
            templateUrl: 'vistas/verPeriodo.php',
            controller: "verPeriodo",
            resolve:{
                periodo:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/verPeriodo.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/periodo/:cod_periodo',{
            templateUrl: 'vistas/periodo.php',
            controller: "periodo",
            resolve:{
                periodo:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerPeriodo.php",$route.current.params,function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        when('/periodos',{
            templateUrl: 'vistas/periodos.php',
            controller: "verPeriodos",
            resolve:{
                periodos:function($route,db,$q){

                    var deferred = $q.defer();

                    db.post("php/obtenerPeriodos.php",{},function(data){

                       deferred.resolve(data); 
                        
                    });

                    return deferred.promise;

                }
            }
        }).
        otherwise({
            redirectTo: '/inicio'
        });

    }
]);