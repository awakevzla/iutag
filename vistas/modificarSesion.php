<form name="formulario" data-ng-submit="guardar()" class="col-sm-6 col-centered" novalidate>
	<fieldset>
		<legend>Periodo {{nuevo.fecha_inicio|date:'m - yy'}} | Sección {{nuevo.nro}} </legend>
		<div class="form-group">
			<label>Nro Sección</label>
			<input type="text" name="nro_seccion" required data-ng-model="nuevo.nro" class="form-control" placeholder="Nro de Seccion">
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</fieldset>
</form>