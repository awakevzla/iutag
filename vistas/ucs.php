<div class="well col-sm-7 col-centered">

	<h1>Unidades Curriculares <a href="#/uc" class="pull-right btn btn-primary">Nueva UC</a></h1>
	
	<div class="row">
		<div class="col-sm-7">
			<label>Nombre</label>
			<input type="text" class="form-control" ng-model="buscar.nombre_uc" placeholder="Nombre">
		</div><div class="col-sm-5">
			<label>Trimestre</label>
			<input type="text" class="form-control" ng-model="buscar.trimestre" placeholder="Trimestre">
		</div>
	</div>

	<table class="table" data-ng-if="ucs.length > 0">
        <thead>
          <tr>
            <th>Trimestre</th>
            <th>Nombre</th>
            <th>Horas Semanales</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-repeat="uc in ucs|filter:buscar|orderBy:'+cod_trayecto'">
				<td>{{uc.trimestre}}</td>
				<td>{{uc.nombre_uc}}</td>
				<td>{{uc.horas_semanales}} h</td>
            	<td>
            		<div class="btn-group">
        		    	<!-- <a href="#/uc/{{uc.cod_uc}}" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> -->
        		    	<a data-ng-click="eliminar(uc)" class="btn btn-default" aria-label="Center Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    </div>
            	</td>
        	</tr>
        </tbody>
    </table>

    <h1 data-ng-if="ucs.length == 0">No hay unidades curriculares almacenadas.</h1>

</div>