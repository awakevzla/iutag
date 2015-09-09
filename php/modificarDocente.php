<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$docente;

	$db->add("docente")->update($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = array("cod_docente" => $cod_docente);

	})->commit();

	json($docente);


 ?>