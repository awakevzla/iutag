<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->insert($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = $cod_docente;

	})->commit();

	json($docente);


 ?>