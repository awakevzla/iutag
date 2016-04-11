<form name="formulario" class="well" ng-submit="reporte()" novalidate>
    <fieldset class="row">
        <h1>Reportes</h1>
        <div class="col-lg-3">
            <label for="tipo_reporte">Tipo de Reporte</label>
            <select name="tipo_reporte" id="tipo_reporte" ng-model="nuevo.tipo_reporte" class="form-control">
                <option value="">Todos</option>
                <option value="1">Reporte de Acceso</option>
                <option value="2">Reporte de Operaciones</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input required name="fecha_inicio" datepicker id="fecha_inicio" type="text" class="form-control" ng-model="nuevo.fecha_inicio" placeholder="Inicio">
        </div>
        <div class="col-lg-3">
            <label for="fecha_fin">Fecha Fin</label>
            <input required datepicker name="fecha_fin" id="fecha_fin" type="text" class="form-control" ng-model="nuevo.fecha_fin" placeholder="Fin">
        </div>
        <div data-ng-if="usuarios.length > 0" class="col-lg-3">
            <label for="usuario">Usuario</label>
            <select name="usuario" class="form-control" id="usuario" ng-model="nuevo.usuario">
                <option value="">Todos</option>
                <option data-ng-init="usuario.nombre_completo = usuario.nombre+' '+usuario.apellido" data-ng-repeat="usuario in usuarios" value="{{usuario.cod_usuario}}">{{usuario.nombre_completo}}</option>
            </select>
        </div>
    </fieldset><br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Generar PDF</button>
</form>