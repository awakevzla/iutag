<form name="formulario" data-ng-submit="iniciar()" class="col-sm-4 col-centered" novalidate>
    <fieldset>
    	<legend>Acceso</legend>
    	<div class="form-group">
        	<label for="inputEmail"><span class="glyphicon glyphicon-user"></span> Usuario</label>
        	<input type="text" id="txtUsuario" class="form-control" data-ng-model="nuevo.user" placeholder="Usuario">
    	</div>
    	<div class="form-group">
        	<label for="inputPassword"><span class="glyphicon glyphicon-asterisk"></span> Clave</label>
        	<input type="password" class="form-control" data-ng-model="nuevo.clave" placeholder="Clave">
    	</div>
    	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Acceder</button>
		&nbsp;<span><a href="" id="restaurarClave"><span class="glyphicon glyphicon-repeat"></span> Restaurar Contraseña</a></span>
    </fieldset>
</form>
<script>
	$(document).on("click", "#restaurarClave", function () {
		usuario=$("#txtUsuario").val();
		if (usuario==""){
			alert("Debe Ingresar un Usuario, verifique...");
		}
		$.ajax({
			url: "php/enviarClave.php",
			data:{usuario:usuario},
			dataType: "JSON",
			type: "POST",
			error: function (resp) {
				alert("!Ha ocurrido un problema, comuníquese con el administrador!");
				console.log(resp.responseText);
			},
			success: function (response) {
				console.log(response);
				/*if (parseInt(response)){
					alert("¡Se ha activado correctamente el flujograma!");
					getFlujogramaModelo(modelo);
					$("#estaciones").html("");
					$("#estaciones_asociadas").html("");
				}else{
					alert("¡Ha ocurrido un problema!");
					console.log(response);
				}*/
			}
		});
	});
</script>