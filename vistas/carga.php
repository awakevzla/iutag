<form name="formulario" data-ng-submit="guardar()" class="col-sm-6 col-centered">
	<fieldset>
		<legend> Asignar Carga <br/> Sección {{nuevo.nro}} {{nuevo.nombre_uc}} - {{nuevo.horas_semanales}}h Semanales</legend>
		<div class="form-group">
	    	<label>Docente</label>
	    	<input autocomplete-add="nuevo" autocomplete-otro="nuevo.asignaciones" autocomplete-url="php/buscarDocente.php" autocomplete-render="docente" data-ng-model="nuevo.nombre" autocomplete-set="nuevo.cod_docente" type="text" class="form-control" placeholder="Docente">
		</div>
		<legend>Aulas Asignadas <span data-ng-if="nuevo.horas_semanales != nuevo.horas && nuevo.horas_semanales != nuevo.aulas.length" class="glyphicon glyphicon-plus btn-xs" data-ng-click="anadirSalon()"></span></legend>
		<div data-ng-init="aula.cod_periodo = nuevo.cod_periodo; aula.cod_carga = nuevo.cod_carga" data-ng-repeat="aula in nuevo.aulas">
			<legend style="font-size: 1.2em">Sesión Nro {{$index+1}} <span data-ng-if="nuevo.aulas.length > 1" class="glyphicon glyphicon-minus btn-xs" data-ng-click="removerSalon(aula)"></span></legend>
			<div class="form-group">
		    	<label>Hora</label>
		    	<div class="input-group">
		        	<div class="input-group-btn">
		        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> {{aula.turno||'Turno'}} <span class="caret"></span></button>
		        		<ul class="dropdown-menu" role="menu">
		            		<li data-ng-repeat="(turno, data) in turnos" data-ng-click="colocarTurno(turno,aula)">
		            			<a>{{data.nombre}}</a>
		            		</li>
		        		</ul>
		        	</div>
		        	<input data-ng-model="aula.horas" data-ng-change="cambioDuracion(aula)" type="text" class="form-control" placeholder="Duración (Horas Académicas)">
		        	<div class="input-group-btn">
		        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span data-ng-if="aula.hora_entrada">{{aula.hora_entrada|time}} - {{aula.hora_salida|time}}</span><span data-ng-if="!aula.hora_entrada">Hora</span> <span class="caret"></span></button>
		        		<ul class="dropdown-menu dropdown-menu-right" role="menu">
		            		<li data-ng-if="$index < turnos[aula.turno_actual].horas.length - (aula.hora - 1)" data-ng-click="colocarHora(hora[0],aula,$index)" data-ng-repeat="hora in turnos[aula.turno_actual].horas">
		            			<a>{{hora[0]|time}}</a>
		            		</li>
		        		</ul>
		        	</div>
		    	</div>
			</div>
			<div class="form-group">
		    	<label>Aula</label>
		    	<input type="hidden" name="aula" data-ng-model="aula.cod_aula" required>
		    	<input autocomplete-add="aula" data-ng-disabled="!aula.dia_semana || !aula.hora_salida || !aula.hora_entrada" autocomplete-url="php/buscarAula.php" autocomplete-render="aula" data-ng-model="aula.nombre" autocomplete-set="aula.cod_aula" type="text" class="form-control" placeholder="Aula">
			</div>
			<div class="form-group">
		    	<label>Día Semana</label>
		    	<div class="btn-group btn-group-justified">
		        	<a data-ng-class="{active:aula.dia_semana == dia.value}" data-ng-repeat="dia in dias" class="btn btn-default" data-ng-click="colocarDia(dia.value,aula)" role="button">{{dia.text}}</a>
		    	</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</fieldset>
</form>