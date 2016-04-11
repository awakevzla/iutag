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
            var re = /^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            if ($scope.nuevo.clave){
                var valid=re.test($scope.nuevo.clave);
                if (!valid){
                    alert("La contraseña no cumple con los parámetros básicos\nDebe tener:\nAl menos una letra mayúscula, Un símbolo, Un número y al menos 8 caracteres.");
                    return;
                }
            }
            if (!confirm("Esta seguro de modificar ésta información?")){
                return;
            }
            $scope.nuevo.cod_usuario=usuario.info.cod_usuario;
            $scope.nuevo.clave_anterior=$scope.anterior.clave;
            $scope.nuevo.clave_actual=usuario.info.clave;
            $scope.nuevo.usuario=usuario.info.usuario;
            $scope.nuevo.nombre=usuario.info.nombre;
            $scope.nuevo.apellido=usuario.info.apellido;
            db.post("php/modificarUsuario.php", $scope.nuevo, function (data) {
                if (data=="clave_anterior_invalida"){
                    alert("La contraseña anterior no es correcta.!");
                    location.reload();
                    return;
                }
                if (!data.cod_usuario){
                    alert("Ocurrió un inconveniente al actualizar, intente nuevamente!");
                    location.reload();
                    return;
                }

                alert("Actualización completada.");
                info=angular.fromJson(localStorage.usuario);
                info.clave=data.clave_nueva;
                localStorage.usuario = angular.toJson(info);
                location.reload();
            })

        }
    }
});