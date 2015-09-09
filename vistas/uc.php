<form name="formulario" class="col-sm-6 col-centered" data-ng-submit="crear()">
	<fieldset>
		<legend data-ng-if="!nuevo.cod_uc">Ingresar Unidad Curricular</legend>
		<legend data-ng-if="!!nuevo.cod_uc">Unidad Curricular - {{nuevo.nombre_uc}}</legend>
		<div data-ng-if="!nuevo.cod_uc" class="form-group">
			<label for="input-control">Unidad Curricular</label>
			<input data-ng-model="nuevo.nombre_uc" type="text" id="input-control" class="form-control" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label>Nro Semanas</label>
			<div class="btn-group btn-group-justified">
				<a ng-click="set('nro_semanas',semana)" data-ng-repeat="semana in semanas" data-ng-class="{active:nuevo.nro_semanas==semana}" class="btn btn-default" role="button">
					{{semana}} s
				</a>
			</div>
		</div>
		<div class="form-group">
			<label>Horas Semanales</label>
			<input data-ng-model="nuevo.horas_semanales" type="text" class="form-control" placeholder="Horas Semanales">
		</div>
		<div class="form-group">
			<label>Trimestre</label>
			<input autocomplete-url="php/buscarTrayecto.php" autocomplete-otro="nuevo.cod_trayecto" autocomplete-render="trimestre" data-ng-model="nuevo.trimestre" autocomplete-set="nuevo.cod_trimestre" type="text" class="form-control" placeholder="Trimestre">
		</div>
		<div data-ng-if="!nuevo.cod_uc">
			<button type="submit" class="btn btn-primary">Crear</button>
			<button type="submit" data-ng-click="otro()" class="btn btn-primary">Crear & Nuevo</button>
		</div>
		<div data-ng-if="!!nuevo.cod_uc">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</fieldset>
</form>