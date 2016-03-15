<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$aula;

	$db
	->add("aula")
	->select()
	->where(array("cod_aula" => $_POST["cod_aula"]))
	->exe(function($data){

		global $aula;

		$aula=$data[0];
		
	});

	$db
	->add("carga")
	->select("*,trayecto.nombre AS trayecto,trimestre.nombre AS trimestre","carga,asignacion,seccion,uc,trimestre,trayecto,periodo,docente")
	->where("periodo.cod_periodo = :cod_periodo AND trayecto.cod_trayecto = trimestre.cod_trayecto AND periodo.cod_periodo = seccion.cod_periodo AND uc.cod_trimestre = trimestre.cod_trimestre AND cod_aula = :cod_aula AND carga.cod_uc = uc.cod_uc AND asignacion.cod_carga = carga.cod_carga AND carga.cod_docente = docente.cod_docente AND carga.cod_seccion = seccion.cod_seccion",true,$_POST)
	->exe(function($data){

		global $aula;

		$aula["carga"]=$data;
		
	});

	json($aula);

 ?>