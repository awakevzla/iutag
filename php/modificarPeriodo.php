<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$periodo;

	$db->add("periodo")->update($_POST)->exe(function($cod_periodo){

		global $periodo;

		$periodo = array("cod_periodo" => $cod_periodo);

	})->commit();

	json($periodo);


 ?>