<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$periodo;

	$db->add("periodo")->insert($_POST)->exe(function($cod_periodo){

		global $periodo;

		$periodo = $cod_periodo;

	})->commit();

	json($periodo);


 ?>