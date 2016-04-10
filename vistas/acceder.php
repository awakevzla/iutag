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
		<div class="form-group" id="divCapt">
        	<label for="captcha"><span class="glyphicon glyphicon-asterisk"></span> Captcha</label><br><img id="imagen" src="vistas/captcha.php">
        	<input type="text" class="form-control" id="captcha" placeholder="Captcha">
			<a class="btn btn-info" id="validarCaptcha">Validar Captcha</a>
    	</div>
    	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Acceder</button>
		&nbsp;<span><a href="" id="restaurarClave"><span class="glyphicon glyphicon-repeat"></span> Restaurar Contraseña</a></span>
    </fieldset>
</form>
<script>
	function agregarIntento(usuario){
		$.ajax({
			url: "php/agregarIntento.php",
			data:{usuario:usuario},
			dataType: "text",
			type: "POST",
			error: function (resp) {
				alert("!Ha ocurrido un problema, comuníquese con el administrador!");
				console.log(resp.responseText);
			},
			success: function (response) {
				console.log(response);
			}
		});
	}
	var respuesta="";
	var baneado="";
	$("button[type=submit]").attr("disabled", true);
	$(document).on("click", "#restaurarClave", function () {
		usuario=$("#txtUsuario").val();
		if (usuario==""){
			alert("Debe Ingresar un Usuario, verifique...");
			return;
		}
		$.ajax({
			url: "php/obtenerPregunta.php",
			data:{usuario:usuario},
			dataType: "JSON",
			type: "POST",
			error: function (resp) {
				alert("!Ha ocurrido un problema, comuníquese con el administrador!");
				console.log(resp.responseText);
			},
			success: function (response) {
				console.log(response);
				if (response.length==1){
					$("#pregunta_id").val(response[0]["pregunta_id"])
					respuesta=response[0]["respuesta"];
					baneado=response[0]["baneado"];
					$("#restaurar").modal();
				}else{
					alert("Ocurrio un inconveniente, intente nuevamente!");
				}
			}
		});
		/*$.ajax({
			url: "php/enviarClave.php",
			data:{usuario:usuario},
			dataType: "JSON",
			type: "POST",
			beforeSend:function(){
				$("#enviando").modal();
			},
			error: function (resp) {
				alert("!Ha ocurrido un problema, comuníquese con el administrador!");
				console.log(resp.responseText);
			},
			success: function (response) {
				$("#enviando").modal("hide");
				console.log(response);
			}
		});*/
	});
	$(document).on("click", "#validarCaptcha", function () {
		valor=$("#captcha").val();
		$.ajax({
			url     :"vistas/validarCaptcha.php",
			data    :{valor:valor},
			dataType:"text",
			type    :"post",
			error   : function(resp){
				alert("!Ha ocurrido un error!");
				console.log(resp);
			},
			success:function(response){
				if (parseInt(response)==1){
					$("#divCapt").addClass("has-success");
					$("button[type=submit]").attr("disabled", false);
					$("#validarCaptcha").slideUp();

				}else{
					alert("¡Captcha inválido, intente nuevamente!");
					location.reload();
				}
			}
		});
	});
	$(document).on("click", "#btnRestaurar", function () {
		respuesta_tmp=$("#respuesta").val();
		usuario=$("#txtUsuario").val();
		console.log(baneado);
		if (respuesta_tmp==respuesta || baneado=="1"){
			$.ajax({
				url: "php/enviarClave.php",
				data:{usuario:usuario},
				dataType: "JSON",
				type: "POST",
				beforeSend:function(){
					$("#restaurar").modal("hide");
					$("#enviando").modal();
				},
				error: function (resp) {
					if (resp.responseText=="usuario_baneado"){
						alert("!Usuario Bloqueado, comuníquese con el administrador!");
					}else{
						alert("!Ha ocurrido un problema, comuníquese con el administrador!");
					}
					$("#enviando").modal("hide");
				},
				success: function (response) {
					$("#enviando").modal("hide");
					alert("Clave enviada a su correo electronico.!");
					console.log(response);
				}
			});
		}else{
			alert("Respuesta incorrecta, intente nuevamente o comuniquese con el administrador!");
			agregarIntento(usuario);
			return;
		}
	});
</script>

<div id="restaurar" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Restaurar Contraseña</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="pregunta_id">Pregunta Secreta</label>
					<select name="pregunta_id" id="pregunta_id" required class="form-control" ng-model="nuevo.pregunta_id">
						<option value="">Seleccione...</option>
						<option value="1">Nombre de su madre</option>
						<option value="2">Mejor amigo de la infancia</option>
						<option value="3">Nombre de su primera mascota</option>
						<option value="4">Lugar de nacimiento</option>
					</select>
				</div>
				<div class="form-group">
					<label>Respuesta</label>
					<input type="text" id="respuesta" name="respuesta" required class="form-control" placeholder="Respuesta">
				</div>
				<div class="form-group">
					<a class="btn btn-success" id="btnRestaurar">Restaurar</a>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="enviando" style="padding: 0;margin: 0;">
	<div class="modal-dialog" >
		<div class="modal-content" style="padding: 0;margin: 0;">
			<div class="modal-body" style="text-align: center;">
				<img src="img/cargando.gif" alt="" style="padding: 0;margin: 0;">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->