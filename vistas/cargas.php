<div class="well col-sm-9 col-centered">

	<h1>Cargas</h1>
	
	<div class="row">
		<div class="col-sm-3">
			<label>Unidad Curricular</label>
			<input type="text" class="form-control" ng-model="buscar.nombre_uc" placeholder="Nombre UC">
		</div><div class="col-sm-3">
            <label>Docente</label>
            <input type="text" class="form-control" ng-model="buscar.nombre_docente" placeholder="Docente">
        </div><div class="col-sm-3">
            <label>Sección</label>
            <input type="text" class="form-control" ng-model="buscar.nro" placeholder="Seccion">
        </div><div class="col-sm-3">
			<label>Trimestre</label>
			<input type="text" class="form-control" ng-model="buscar.trimestre" placeholder="Trimestre">
		</div>
	</div>

	<table class="table" data-ng-if="cargas.length > 0">
        <thead>
          <tr>
            <th>Trimestre</th>
            <th>Periodo</th>
            <th>UC</th>
            <th>Sección</th>
            <th>Docente</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="carga in cargas|filter:buscar">
				<td>{{carga.trimestre}}</td>
                <td>{{carga.fecha_inicio|date:'m - yy'}}</td>
				<td>{{carga.nombre_uc}}</td>
                <td>{{carga.nro}}</td>
                <td data-ng-if="!carga.cod_docente">N/A</td>
                <td data-ng-if="!!carga.cod_docente">{{carga.nombre_docente}}</td>
            	<td>
            		<div class="btn-group">
        		    	<a href="#/carga/{{carga.cod_carga}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		    	<a data-ng-click="eliminar(carga)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    </div>
            	</td>
        	</tr>
        </tbody>
    </table>

    <h1 data-ng-if="cargas.length == 0">No hay cargas almacenadas</h1>

</div>