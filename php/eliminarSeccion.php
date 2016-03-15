<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$seccion;

	$db->add("seccion")->delete($_POST)->exe(function($cod_seccion){

		global $seccion;

		$seccion = array("cod_seccion" => $cod_seccion);

	})->commit();

	json($seccion);


 ?>