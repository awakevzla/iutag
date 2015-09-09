<div class="jumbotron col-sm-7 col-centered" data-ng-controller="navegacion">
	<h1>SADCA</h1>
	<p>Bienvenido al sistema administrativo de carga académica (SADCA), a través de este sistema podrá realizar las siguientes acciones:</p>

	<div class="row">
		<div class="col-sm-8">
			<ul class="list-group">
				<li class="list-group-item">Ingresar Profesores</li>
				<li class="list-group-item">Incluir Trayecto y Trimestre</li>
				<li class="list-group-item">Generar Periodo</li>
				<li class="list-group-item">Insertar Unidades Curriculares</li>
				<li class="list-group-item">Asignar Cargas</li>
				<li class="list-group-item">Generar Horarios</li>
			</ul>
		</div><!-- /.col-sm-4 -->
	</div>
	<p><a data-ng-if="!usuario.accedio" href="#/acceder" class="btn btn-primary btn-lg" role="button">Acceder</a></p>
</div>