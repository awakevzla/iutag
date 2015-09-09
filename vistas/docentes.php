<div class="well col-sm-7 col-centered">

	<h1>Docentes <a href="#/docente" class="pull-right btn btn-primary">Nuevo Docente</a></h1>
	
	<div class="row">
		<div class="col-sm-6">
			<label>Nombre</label>
			<input type="text" class="form-control" ng-model="buscar.nombre" placeholder="Nombre">
		</div><div class="col-sm-5">
			<label>Cédula</label>
			<input type="text" class="form-control" ng-model="buscar.cedula" placeholder="Cedula">
		</div>
	</div>

	<table class="table" data-ng-if="docentes.length >0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="docente in docentes|filter:buscar">
				<td>{{docente.nombre}} {{docente.apellido}}</td>
				<td>{{docente.nacionalidad}}-{{docente.cedula}}</td>
            	<td>
            		<div class="btn-group">
                        <a href="#/docente/{{docente.cod_docente}}" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a>
        		    	<a href="#/docente/modificar/{{docente.cod_docente}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		    	<a data-ng-click="eliminar(docente)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    </div>
            	</td>
        	</tr>
        </tbody>
    </table>

    <h1 data-ng-if="docentes.length == 0">No hay docentes almacenados.</h1>

</div>