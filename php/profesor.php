<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$profesor;

	$db
	//Añade la tabla
	->add("docente")
	//Genera el codigo insert
	->insert($_POST)->exe(function($cod_profesor){

		//Retorna el id ingresado
		global $profesor;

		$profesor = $cod_profesor;

	})->commit();


	//Combierte las variables de PHP en objetos JS
	json($profesor);


 ?>