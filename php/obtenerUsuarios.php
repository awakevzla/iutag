<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("usuario")
	->select("*, if (baneado=0, 'No', 'Si') as baneado_txt")
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>