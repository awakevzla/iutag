<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$carga;

	$db
	->add("carga")
	->select("horas_semanales,nro,seccion.cod_periodo,cod_carga,seccion.cod_seccion,cod_docente,nombre_uc,CONCAT(trayecto.nombre,' ',trimestre.nombre) AS trimestre","carga, seccion, uc, periodo,trimestre,trayecto")
	->where("trayecto.cod_trayecto = trimestre.cod_trayecto AND trimestre.cod_trimestre = seccion.cod_trimestre AND carga.cod_uc = uc.cod_uc AND carga.cod_seccion = seccion.cod_seccion AND periodo.cod_periodo = seccion.cod_periodo AND cod_carga = :cod_carga",true,$_POST)
	->exe(function($data){

		global $carga;

		$carga = $data[0];
		
	});
		
	$carga;

	if($carga["cod_docente"] != NULL){

		$db
		->add("docente")
		->select("CONCAT(nombre,' ',apellido) AS nombre")
		->where(array("cod_docente"=>$carga["cod_docente"]))
		->exe(function($docente){

			global $carga,$i;

			$carga = array_merge($carga,$docente[0]);
			
		});

	}

	$db
	->add("asignacion")
	->select("*","asignacion,aula,carga,seccion")
	->where("carga.cod_carga=:cod_carga AND cod_periodo = :cod_periodo AND aula.cod_aula = asignacion.cod_aula AND carga.cod_carga = asignacion.cod_carga AND seccion.cod_seccion = carga.cod_seccion",true,array("cod_carga"=>$carga["cod_carga"],"cod_periodo"=>$carga["cod_periodo"]))
	->exe(function($aulas){

		global $carga,$i;

		$carga["aulas"] = $aulas;
		
	});

	$db
	->add("asignacion")
	->select("*","asignacion,aula,carga,seccion")
	->where("cod_docente=:cod_docente AND cod_periodo = :cod_periodo AND aula.cod_aula = asignacion.cod_aula AND carga.cod_carga = asignacion.cod_carga AND seccion.cod_seccion = carga.cod_seccion",true,array("cod_docente"=>$carga["cod_docente"],"cod_periodo"=>$carga["cod_periodo"]))
	->exe(function($aulas){

		global $carga,$i;

		$carga["asignaciones"] = $aulas;
		
	});

	json($carga);

 ?>