<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$aula;
	$db->add("aula")->insert($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = $cod_aula;

	})->commit();

	json($aula);


 ?>