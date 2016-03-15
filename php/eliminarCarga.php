<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$carga;

	$db->add("carga")->delete($_POST)->exe(function($cod_carga){

		global $carga;

		$carga = array("cod_carga" => $cod_carga);

	})->commit();

	json($carga);


 ?>