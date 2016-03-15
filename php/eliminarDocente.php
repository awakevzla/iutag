<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->delete($_POST)->exe(function($cod_periodo){

		global $docente;

		$docente = array("cod_periodo" => $cod_periodo);

	})->commit();

	json($docente);


 ?>