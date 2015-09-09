<form name="formulario" ng-submit="crear()" novalidate class="col-sm-6 col-centered">
	<fieldset>
		<legend>Ingresar Usuario</legend>
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="nombre" required class="form-control" ng-model="nuevo.nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label>Apellido</label>
			<input type="text" name="apellido" required class="form-control" ng-model="nuevo.apellido" placeholder="Apellido">
		</div>
		<div class="form-group">
			<label>Cédula</label>
			<input type="text" name="cedula" required ng-model="nuevo.cedula" placeholder="Cédula" class="form-control">
		</div>
		<div class="form-group">
			<label>Teléfono</label>
			<input type="text" ng-model="nuevo.telefono" placeholder="Teléfono" class="form-control">
		</div>
		<div class="form-group">
			<label>Correo</label>
			<input type="email" name="correo" required class="form-control" ng-model="nuevo.correo" placeholder="Correo">
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<input type="text" ng-model="nuevo.direccion" placeholder="Dirección" class="form-control">
		</div>
		<div class="form-group">
			<label>Tipo</label>
			<div class="btn-group btn-group-justified">
				<a data-ng-repeat="tipo in tipos" data-ng-class="{active:nuevo.tipo==tipo.value}" data-ng-click="set('tipo',tipo.value)" class="btn btn-default" role="button">
					{{tipo.text}}
				</a>
			</div>
		</div>
		<div class="form-group">
			<label>Usuario</label>
			<input type="text" name="usuario" required class="form-control" ng-model="nuevo.usuario" placeholder="Usuario">
		</div>
		<div class="form-group">
			<label>Clave</label>
			<input type="password" name="clave" required class="form-control" ng-model="nuevo.clave" placeholder="Clave">
		</div>
		<button data-ng-if="!!nuevo.cod_usuario" type="submit" class="btn btn-primary">Guardar</button>
		<button data-ng-if="!nuevo.cod_usuario" type="submit" class="btn btn-primary">Crear</button>
		<button data-ng-if="!nuevo.cod_usuario" type="submit" data-ng-click="otro()" class="btn btn-primary">Crear & Nuevo</button>
	</fieldset>
</form>