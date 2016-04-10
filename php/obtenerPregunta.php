<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("usuario")
	->select("pregunta_id, respuesta, baneado")
	->where($_POST)
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>