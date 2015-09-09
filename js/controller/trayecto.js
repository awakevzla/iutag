addController({
    trayecto:function($scope,db,$location){

    	$scope.nuevo = {

    		trimestres : [

    			{},
    			{},
    			{}

    		]

    	};

        $scope.crear = function(){

        	if($scope.formulario.$valid == false){

        		return;

        	}
        	
        	db.post("php/crearTrayecto.php",$scope.nuevo,function(data){

        		if(!!data && !!data.cod_trayecto){

        			$location.path("/trayecto/"+data.cod_trayecto)

        		}
        		
        	});

        }

    }
});