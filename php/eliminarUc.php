<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$uc;

	$db->add("uc")->delete($_POST)->exe(function($cod_uc){

		global $uc;

		$uc = array("cod_uc" => $cod_uc);

	})->commit();

	json($uc);


 ?>