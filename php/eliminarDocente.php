<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$docente;

	$db->add("docente")->delete($_POST)->exe(function($cod_periodo){

		global $docente;

		$docente = array("cod_periodo" => $cod_periodo);

	})->commit();

	json($docente);


 ?>