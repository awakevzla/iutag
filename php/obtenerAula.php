<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$aula;

	$db
	->add("aula")
	->select()
	->where($_POST)
	->exe(function($data){

		global $aula;

		$aula = $data[0];
		
	});

	$db
	->add("asignacion")
	->select("*,COUNT(periodo.cod_periodo) AS periodos","asignacion,carga,seccion,periodo")
	->where("seccion.cod_periodo = periodo.cod_periodo AND seccion.cod_seccion = carga.cod_seccion AND cod_aula = :cod_aula AND carga.cod_carga = asignacion.cod_carga",true,$_POST)
	->groupBy("periodo.cod_periodo")
	->exe(function($data){

		global $aula;

		$aula["periodos"] = $data;
		
	});

	json($aula);

 ?>