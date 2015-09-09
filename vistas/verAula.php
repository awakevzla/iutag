<div class="well col-sm-7 col-centered">

	<h1>Aula {{nombre}}</h1>

	<table class="table">
        <thead>
	        <tr>
	            <th>Capacidad</th>
	          	<th>Tipo</th>
	        </tr>
        </thead>
        <tbody>
        	<tr>
				<td>{{capacidad}}</td>
				<td>{{tipo}}</td>
        	</tr>
        </tbody>
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
        		    	<a href="#/imprimir/aula-{{cod_aula}}/{{periodo.cod_periodo}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
        		    </div>
				</td>
        	</tr>
        </tbody>
    </table>
    <h2 data-ng-if="periodos.length == 0">Esta aula no ha sido utilizada en ningun periodo</h2>

</div>