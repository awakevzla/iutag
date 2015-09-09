<div class="well col-sm-7 col-centered">

	<h1>Aulas <a href="#/aula" class="pull-right btn btn-primary">Nueva Aula</a></h1>
	
	<div class="row">
		<div class="col-sm-12">
            <label>Nombre</label>
            <input type="text" class="form-control" ng-model="buscar.nombre" placeholder="Nombre">
        </div>
	</div>
	
	<table class="table" ng-if="aulas.length > 0">
        <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Capacidad</th>
	          	<th>Tipo</th>
	          	<th>Acciones</th>
	        </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="aula in aulas | orderBy:'+nombre' | filter:buscar">
				<td>{{aula.nombre}}</td>
				<td>{{aula.capacidad}}</td>
				<td>{{aula.tipo}}</td>
				<td>
            		<div class="btn-group">
        		    	<a href="#/aula/{{aula.cod_aula}}" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a>
        		    	<a href="#/aula/modificar/{{aula.cod_aula}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		    	<a data-ng-click="eliminar(aula)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    </div>
				</td>
        	</tr>
        </tbody>
    </table>
    <h1 data-ng-if="aulas.length == 0">No hay Aulas Almacenadas</h1>

</div>