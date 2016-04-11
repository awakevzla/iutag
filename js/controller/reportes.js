addController({
    reportes: function ($scope, array, db, usuarios, usuario) {
        $scope.usuarios = usuarios;
        $scope.reporte = function () {
            console.log($scope);
            if ($scope.formulario.$valid == false) {
                return;
            }
            if (!$scope.formulario.usuario.$modelValue)
                $scope.formulario.usuario.$modelValue=0;
            window.open("php/reporte_pdf.php?fecha_inicio="+$scope.formulario.fecha_inicio.$modelValue+"&fecha_fin="+$scope.formulario.fecha_fin.$modelValue+"&usuario="+$scope.formulario.usuario.$modelValue+"&tipo_reporte="+$scope.formulario.tipo_reporte.$modelValue, 'toolbar=no');
        }
    }
});