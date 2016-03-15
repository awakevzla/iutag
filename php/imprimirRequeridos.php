<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$requeridos;

	$db
	->add("carga")
	->select("*","carga,seccion,asignacion,aula")
	->where("asignacion.cod_aula = aula.cod_aula AND carga.cod_carga = asignacion.cod_carga AND cod_periodo = :cod_periodo AND cod_docente IS NULL AND carga.cod_seccion = seccion.cod_seccion",true,$_POST)
	->groupBy("aula.cod_aula")
	->exe(function($data){

		global $requeridos;

		$requeridos=$data;
		
	});

	for ($i=0; $i < count($requeridos); $i++) { 

		$db
		->add("carga")
		->select("*,aula.nombre AS aula,trayecto.nombre AS trayecto,trimestre.nombre AS trimestre","carga,asignacion,seccion,uc,trimestre,trayecto,periodo,aula")
		->where("asignacion.cod_aula = aula.cod_aula AND carga.cod_docente IS NULL AND aula.cod_aula = :cod_aula AND periodo.cod_periodo = :cod_periodo AND trayecto.cod_trayecto = trimestre.cod_trayecto AND periodo.cod_periodo = seccion.cod_periodo AND uc.cod_trimestre = trimestre.cod_trimestre AND carga.cod_uc = uc.cod_uc AND asignacion.cod_carga = carga.cod_carga AND carga.cod_seccion = seccion.cod_seccion",true,array_merge($_POST,array("cod_aula" => $requeridos[$i]["cod_aula"])))
		->exe(function($data){

			global $requeridos,$i;

			$requeridos[$i]["carga"]=$data;
			
		});

	}

	json($requeridos);

 ?>