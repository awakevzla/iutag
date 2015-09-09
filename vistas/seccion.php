<form name="formulario" data-ng-submit="crear()" class="col-sm-6 col-centered" novalidate>
	<fieldset>
		<legend>Secciones</legend>
		<div class="form-group">
			<label>Trimestre</label>
			<input autocomplete-url="php/buscarTrayecto.php" autocomplete-render="trimestre" data-ng-model="trimestre" autocomplete-set="nuevo.cod_trimestre" type="text" class="form-control" placeholder="Trimestre">
		</div>
		<div class="form-group">
			<label>Nro Secciones</label>
			<input type="text" name="nro_seccion" required data-ng-model="nuevo.nro_seccion" class="form-control" placeholder="Nro Secciones">
		</div>
		<div class="form-group">
			<label>Nro Serie</label>
			<input type="text" name="nro_serie" required data-ng-model="nuevo.nro_serie" class="form-control" placeholder="Nro Serie">
		</div>
		<button type="submit" class="btn btn-primary">Crear</button>
	</fieldset>
</form>