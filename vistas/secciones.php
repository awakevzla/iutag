<div class="well col-sm-9 col-centered">

	<h1>Secciones</h1>
	
	<div class="row">
		<div class="col-sm-6">
            <label>Sección</label>
            <input type="text" class="form-control" ng-model="buscar.nro" placeholder="Seccion">
        </div><div class="col-sm-6">
			<label>Trimestre</label>
			<input type="text" class="form-control" ng-model="buscar.trimestre" placeholder="Trimestre">
		</div>
	</div>

	<table class="table" data-ng-if="secciones.length > 0">
        <thead>
          <tr>
            <th>Sección</th>
            <th>Trimestre</th>
            <th>Periodo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="seccion in secciones|filter:buscar">
                <td>{{seccion.nro}}</td>
				<td>{{seccion.trimestre}}</td>
                <td>{{seccion.fecha_inicio|date:'m - yy'}}</td>
            	<td>
            		<div class="btn-group">
        		    	<a href="#/seccion/{{seccion.cod_seccion}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		    	<a data-ng-click="eliminar(seccion)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    </div>
            	</td>
        	</tr>
        </tbody>
    </table>

    <h1 data-ng-if="secciones.length == 0">No hay secciones en almacenadas</h1>

</div>