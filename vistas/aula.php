<form name="formulario" data-ng-submit="crear()" class="col-sm-6 col-centered" novalidate>
	<fieldset>
		<legend>Ingresar Aula</legend>
		<div class="form-group">
			<label>Nombre Aula</label>
			<input type="text" required name="Nombre" data-ng-model="nuevo.nombre" class="form-control" placeholder="Nombre Aula">
		</div>
		<div class="form-group">
			<label>Capacidad</label>
			<input type="text" required name="Capacidad" data-ng-model="nuevo.capacidad" data-ng-entero class="form-control" placeholder="Capacidad">
		</div>
		<input type="hidden" name="Tipo" data-ng-model="nuevo.tipo" required>
		<div class="form-group">
			<label>Tipo</label>
			<div class="btn-group btn-group-justified capitalizar">
				<a data-ng-repeat="tipo in tipos" data-ng-class="{active:nuevo.tipo==tipo}" data-ng-click="set('tipo',tipo)" class="btn btn-default" role="button">
					{{tipo}}
				</a>
			</div>
		</div>
		<button data-ng-if="!!nuevo.cod_aula" type="submit" class="btn btn-primary">Modificar</button>
		<button data-ng-if="!nuevo.cod_aula" type="submit" class="btn btn-primary">Crear</button>
		<button data-ng-if="!nuevo.cod_aula" type="submit" data-ng-click="otro()" class="btn btn-primary">Crear & Nuevo</button>
	</fieldset>
</form>