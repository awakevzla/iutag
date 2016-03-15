<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->update($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = array("cod_docente" => $cod_docente);

	})->commit();

	json($docente);


 ?>