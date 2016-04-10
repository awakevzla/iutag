<div class="well col-sm-9 col-centered">

	<h1>Usuarios <a href="#/usuario" class="pull-right btn btn-primary">Nuevo Usuario</a></h1>
	
	<div class="row">
		<div class="col-sm-7">
			<label>Nombre</label>
			<input type="text" class="form-control" ng-model="buscar.nombre_completo" placeholder="Nombre">
		</div><div class="col-sm-5">
			<label>Cedula</label>
			<input type="text" class="form-control" ng-model="buscar.cedula" placeholder="Cedula">
		</div>
	</div>

	<table class="table" data-ng-if="usuarios.length > 0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Baneado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        	<tr data-ng-init="usuario.nombre_completo = usuario.nombre+' '+usuario.apellido" data-ng-repeat="usuario in usuarios|filter:buscar|orderBy:'+cod_trayecto'">
				<td>{{usuario.nombre}} {{usuario.apellido}}</td>
                <td>{{usuario.cedula}}</td>
                <td>{{usuario.direccion}}</td>
                <td>{{usuario.telefono}}</td>
                <td>{{usuario.correo}}</td>
                <td>{{usuario.baneado_txt}}</td>
            	<td>
            		<div class="btn-group">
        		    	<a href="#/usuario/{{usuario.cod_usuario}}" class="btn btn-default" aria-label="Left Align" title="Modificar Usuario"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		    	<a data-ng-click="eliminar(usuario)" class="btn btn-default" aria-label="Center Align" title="Eliminar Usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        		    	<a data-ng-click="desbanear(usuario)" class="btn btn-default" aria-label="Center Align" title="Desbloquear Usuario"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        		    	<a data-ng-click="cambiarclave(usuario)" class="btn btn-default" aria-label="Center Align" title="Restaurar Clave"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
        		    </div>
            	</td>
        	</tr>
        </tbody>
    </table>

    <h1 data-ng-if="usuarios.length == 0">No hay unidades curriculares almacenadas.</h1>

</div>