<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("seccion")
	->update($_POST)
	->exe(function($data){

		echo json_encode(array("cod_seccion" => $data));
		
	})->commit();
 ?>