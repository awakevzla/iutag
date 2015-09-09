<form name="formulario" ng-submit="crear()" class="col-sm-6 col-centered" novalidate>
	<fieldset>
		<legend>Crear Periodo</legend>
		<div class="form-group">
			<label>Fecha de Inicio</label>
			<input required datepicker name="Fecha de Inicio" type="text" class="form-control" ng-model="nuevo.fecha_inicio" placeholder="Inicio">
		</div>
		<div class="form-group">
			<label>Fecha de Culminación</label>
			<input required datepicker name="Fecha de Culminacion" type="text" class="form-control" ng-model="nuevo.fecha_culminacion" placeholder="Culminación">
		</div>
		<button data-ng-if="!!nuevo.cod_periodo" type="submit" class="btn btn-primary">Guardar</button>
		<button data-ng-if="!nuevo.cod_periodo" type="submit" class="btn btn-primary">Crear</button>
	</fieldset>
</form>