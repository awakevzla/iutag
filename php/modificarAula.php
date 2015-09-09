<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$aula;

	$db->add("aula")->update($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = array("cod_aula" => $cod_aula);

	})->commit();

	json($aula);


 ?>