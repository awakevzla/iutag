<div class="well col-sm-9 col-centered">

	<h1>Periodos <a href="#/periodo" class="pull-right btn btn-primary">Nuevo Periodo</a></h1>
	
	<table class="table" data-ng-if="periodos.length > 0">
        <thead>
          <tr>
          	<th>#</th>
            <th>Periodo</th>
            <th>Inicio</th>
            <th>Culminación</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="periodo in periodos">
				<td>{{$index+1}}</td>
                <td>{{periodo.fecha_inicio|date:'m - yy'}}</td>
				<td>{{periodo.fecha_inicio|date}}</td>
				<td>{{periodo.fecha_culminacion|date}}</td>
				<td>
                    <div class="btn-group">
                        <a href="#/periodo/ver/{{periodo.cod_periodo}}" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="#/periodo/{{periodo.cod_periodo}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a data-ng-click="eliminar(periodo)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        <a href="#/secciones/{{periodo.cod_periodo}}" title="Nuevas Secciones" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    </div>
                </td>
        	</tr>
        </tbody>
    </table>
    <h1 data-ng-if="periodos.length == 0">No hay periodos almacenados</h1>

</div>