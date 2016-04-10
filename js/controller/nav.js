addController({
    navegacion:function($scope,usuario){

        usuario.chekear();

        $scope.logout = function(){
            
            usuario.logout();

        };

        var links = [

            {name : "Inicio",href : "/"},
            {name : "Docentes",href : "/docentes"},
            {name : "Aulas",href : "/aulas"},
            {name : "UCs",href : "/ucs"},
            {name : "Secciones",href : "/secciones"},
            {name : "Periodos",href : "/periodos"},
            {name : "Cargas",href : "/cargas"},
            {name : "Reportes",href : "/reportes"},
            {name : "Usuarios",href : "/usuarios"},
            {name : "Actualizar Datos",href : "/clave"}

        ];

        $scope.$watch("usuario.info",function(nuevo){
            
            if(nuevo == undefined){

                $scope.links=[

                    {name : "Inicio",href : "/"}

                ];

            }else{

                if($scope.usuario.info.tipo == "administrador"){

                    $scope.links=links;

                }else{

                    $scope.links=[

                        {name : "Inicio",href : "/"},
                        {name : "Docentes",href : "/docentes"},
                        {name : "Aulas",href : "/aulas"},
                        {name : "UCs",href : "/ucs"},
                        {name : "Secciones",href : "/secciones"},
                        {name : "Periodos",href : "/periodos"},
                        {name : "Cargas",href : "/cargas"},
                        {name : "Actualizar Datos",href : "/clave"}

                    ];

                }
                
            }

        })

        $scope.usuario = usuario;

        $scope.links=links;

        $scope.actual = false;

        $scope.ubicacion = function(link){

            $scope.actual = link;

        }

    }
});