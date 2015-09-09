app.controller({
    acceder:function($scope,db,usuario){

    	$scope.nuevo = {};

        $scope.iniciar = function(){

        	if(!$scope.nuevo.user || !$scope.nuevo.clave){

        		alert("Debe llenar todos los campos.");

        		return;

        	}

        	usuario.acceder($scope.nuevo.user,$scope.nuevo.clave)

        }

    }
});