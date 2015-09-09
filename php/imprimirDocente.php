<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$docente;

	$db
	->add("docente")
	->select()
	->where(array("cod_docente" => $_POST["cod_docente"]))
	->exe(function($data){

		global $docente;

		$docente=$data[0];
		
	});

	$db
	->add("carga")
	->select("*,aula.nombre AS aula,trayecto.nombre AS trayecto,trimestre.nombre AS trimestre","carga,asignacion,seccion,uc,trimestre,trayecto,periodo,aula,docente")
	->where("aula.cod_aula = asignacion.cod_aula AND periodo.cod_periodo = :cod_periodo AND trayecto.cod_trayecto = trimestre.cod_trayecto AND periodo.cod_periodo = seccion.cod_periodo AND uc.cod_trimestre = trimestre.cod_trimestre AND docente.cod_docente = :cod_docente AND carga.cod_uc = uc.cod_uc AND asignacion.cod_carga = carga.cod_carga AND carga.cod_docente = docente.cod_docente AND carga.cod_seccion = seccion.cod_seccion",true,$_POST)
	->exe(function($data){

		global $docente;

		$docente["carga"]=$data;
		
	});

	json($docente);

 ?>