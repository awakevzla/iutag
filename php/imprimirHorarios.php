<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$requeridos;

	$db
	->add("carga")
	->select("*","carga,seccion,docente")
	->where("carga.cod_docente = docente.cod_docente AND cod_periodo = :cod_periodo AND carga.cod_seccion = seccion.cod_seccion",true,$_POST)
	->exe(function($data){

		global $requeridos;

		$requeridos=$data;
		
	});

	for ($i=0; $i < count($requeridos); $i++) { 

		$db
		->add("carga")
		->select("*,trayecto.nombre AS trayecto,trimestre.nombre AS trimestre","carga,asignacion,seccion,uc,trimestre,trayecto,periodo,docente")
		->where("docente.cod_docente = carga.cod_docente AND docente.cod_docente = :cod_docente AND periodo.cod_periodo = :cod_periodo AND trayecto.cod_trayecto = trimestre.cod_trayecto AND periodo.cod_periodo = seccion.cod_periodo AND uc.cod_trimestre = trimestre.cod_trimestre AND carga.cod_uc = uc.cod_uc AND asignacion.cod_carga = carga.cod_carga AND carga.cod_seccion = seccion.cod_seccion",true,array_merge($_POST,array("cod_docente" => $requeridos[$i]["cod_docente"])))
		->exe(function($data){

			global $requeridos,$i;

			$requeridos[$i]["carga"]=$data;
			
		});

	}

	json($requeridos);

 ?>