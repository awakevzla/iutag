<div class="well col-sm-7 col-centered">
    <fieldset>
        <h1>Reportes</h1>
        <div class="form-group">
            <label for="tipo_reporte">Tipo de Reporte</label>
            <select id="tipo_reporte" class="form-control">
                <option value="">Seleccione...</option>
                <option value="1">Reporte de Acceso</option>
                <option value="2">Reporte de Operaciones</option>
            </select>
        </div>
        <div class="form-group">
            <label>Clave Nueva</label>
            <input type="password" name="clave" ng-model="nuevo.clave" class="form-control" placeholder="Clave Nueva">
        </div>
        <div class="form-group">
            <label for="pregunta_id">Pregunta Secreta</label>
            <select name="pregunta_id" ng-model="nuevo.pregunta_id" id="pregunta_id" class="form-control">
                <option value="">Seleccione...</option>
                <option value="1">Nombre de su madre</option>
                <option value="2">Mejor amigo de la infancia</option>
                <option value="3">Nombre de su primera mascota</option>
                <option value="4">Lugar de nacimiento</option>
            </select>
        </div>
        <div class="form-group">
            <label>Respuesta</label>
            <input type="text" ng-model="nuevo.respuesta" placeholder="Respuesta" class="form-control">
        </div>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Actualizar</button>
    </fieldset>
</div>