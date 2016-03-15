<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("usuario")
	->select()
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>