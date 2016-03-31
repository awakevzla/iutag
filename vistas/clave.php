<form name="formulario" data-ng-submit="actualizar()" class="well col-sm-7 col-centered" novalidate>
        <fieldset>
            <h1>Cambiar Datos personales</h1>
            <div class="form-group">
                <label>Clave Anterior</label>
                <input type="password" name="anterior_clave" ng-model="anterior.clave" class="form-control" placeholder="Clave Anterior">
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
</form>