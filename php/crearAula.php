<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$aula;
	$db->add("aula")->insert($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = $cod_aula;

	})->commit();

	json($aula);


 ?>