<div class="well col-sm-7 col-centered">

	<h1>{{nombre}} {{apellido}} | {{nacionalidad}}-{{cedula}}</h1>

	<table class="table">
        <thead>
	        <tr>
	            <th>Condición</th>
	          	<th>Categoría</th>
	          	<th>Dedicación</th>
	          	<th>Cubículo</th>
	        </tr>
	        <tr>
	            <td>{{condicion}}</td>
	          	<td>{{categoria}}</td>
	          	<td>{{dedicacion}}</td>
	          	<td>{{cubiculo||'No asignado'}}</td>
	        </tr>
	        <tr>
	            <th colspan="4">Observación</th>
	        </tr>
	        <tr>
	            <td colspan="4">{{observaciones||'No hay observaciones'}}</td>
	        </tr>
        </thead>
    </table>
	
	<table class="table" ng-if="periodos.length > 0">
        <thead>
	        <tr>
	            <th>Periodo</th>
	            <th>Sesiones</th>
	          	<th>Acciones</th>
	        </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="periodo in periodos | orderBy:'+cod_periodo' | filter:buscar">
				<td>{{periodo.fecha_inicio|date:'m - yy'}}</td>
				<td>{{periodo.periodos}}</td>
				<td>
            		<div class="btn-group">
        		    	<a href="#/imprimir/docente-{{cod_docente}}/{{periodo.cod_periodo}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
        		    </div>
				</td>
        	</tr>
        </tbody>
    </table>
    <h1 data-ng-if="periodos.length == 0">No hay Aulas Almacenadas</h1>

</div>