<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$seccion;

	$db->add("seccion")->delete($_POST)->exe(function($cod_seccion){

		global $seccion;

		$seccion = array("cod_seccion" => $cod_seccion);

	})->commit();

	json($seccion);


 ?>