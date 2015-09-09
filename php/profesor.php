<?php 
	
	include "mysql.php";

	//Conecta a la base de datos con el usuario 'root' y la clave ''
	$db = new db("root","20296572");

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