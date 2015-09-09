<form name="formulario" ng-submit="crear()" novalidate class="col-sm-6 col-centered">
	<fieldset>
		<legend>Ingresar Docente</legend>
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" required name="nombre" class="form-control" ng-model="nuevo.nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label>Apellido</label>
			<input type="text" required name="apellido" class="form-control" ng-model="nuevo.apellido" placeholder="Apellido">
		</div>
		<div class="form-group">
			<label>Cédula</label>
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> {{nuevo.nacionalidad}} <span class="caret"></span></button>

					<ul class="dropdown-menu" role="menu">
						<li data-ng-repeat="tipo in tipo_cedula" data-ng-click="set('nacionalidad',tipo)"><a>{{tipo}}</a></li>
					</ul>

				</div>
				<input type="text" required name="cedula" ng-model="nuevo.cedula" placeholder="Nro Cedula" class="form-control">
			</div>
		</div>
		<input type="hidden" name="condicion" data-ng-model="nuevo.condicion" required>
		<div class="form-group">
			<label>Condición</label>
			<div class="btn-group btn-group-justified">
				<a ng-click="set('condicion',cond)" data-ng-repeat="cond in condicion" data-ng-class="{active:nuevo.condicion==cond}" class="btn btn-default" role="button">
					{{cond}}
				</a>
			</div>
		</div>
		<input type="hidden" name="dedicacion" data-ng-model="nuevo.dedicacion" required>
		<div class="form-group">
			<label>Dedicación</label>
			<div class="btn-group btn-group-justified">
				<a data-ng-repeat="dedi in dedicacion" data-ng-class="{active:nuevo.dedicacion==dedi}" data-ng-click="set('dedicacion',dedi)" class="btn btn-default" role="button">
					{{dedi}}
				</a>
			</div>
		</div>
		<input type="hidden" name="categoria" data-ng-model="nuevo.categoria" required>
		<div class="form-group">
			<label>Categoría</label>
			<div class="btn-group btn-group-justified">
				<a data-ng-repeat="cat in categoria" data-ng-class="{active:nuevo.categoria==cat}" data-ng-click="set('categoria',cat)" class="btn btn-default" role="button">
					{{cat}}
				</a>
			</div>
		</div>
		<div class="form-group">
			<label>Cubículo</label>
			<input type="text" class="form-control" ng-model="nuevo.cubiculo" placeholder="Cubículo">
		</div>
		<div class="form-group">
			<label>Observación</label>
			<input type="text" class="form-control" ng-model="nuevo.observaciones" placeholder="Observación">
		</div>	
		<button data-ng-if="!!nuevo.cod_docente" type="submit" class="btn btn-primary">Guardar</button>
		<button data-ng-if="!nuevo.cod_docente" type="submit" class="btn btn-primary">Crear</button>
		<button data-ng-if="!nuevo.cod_docente" type="submit" data-ng-click="otro()" class="btn btn-primary">Crear & Nuevo</button>
	</fieldset>
</form>