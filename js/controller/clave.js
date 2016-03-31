addController({
    clave: function ($scope,db,usuario) {
        console.log(usuario);
        info=angular.fromJson(localStorage.usuario);
        localStorage.usuario = angular.toJson(info);
        $scope.nuevo = {};
        $scope.anterior = {};
        $scope.actualizar = function () {
            if (!$scope.anterior.clave || $scope.anterior==""){
                alert("Debe ingresar la contraseña anterior!");
                return;
            }
            if ($scope.anterior.clave!=usuario.info.clave){
                alert("La contraseña anterior no es correcta.!");
                return;
            }
            var re = /^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            var valid=re.test($scope.nuevo.clave);
            if (!valid){
                alert("La contraseña no cumple con los parámetros básicos\nDebe tener:\nAl menos una letra mayúscula, Un símbolo, Un número y al menos 8 caracteres.");
                return;
            }
            if (!confirm("Esta seguro de modificar ésta información?")){
                return;
            }
            $scope.nuevo.cod_usuario=usuario.info.cod_usuario;
            db.post("php/modificarUsuario.php", $scope.nuevo, function (data) {
                if (!data.cod_usuario){
                    alert("Ocurrió un inconveniente al actualizar, intente nuevamente!");
                    location.reload();
                }
                alert("Actualización completada.");
                info=angular.fromJson(localStorage.usuario);
                info.clave=$scope.nuevo.clave;
                localStorage.usuario = angular.toJson(info);
                location.reload();
            })

        }
    }
});