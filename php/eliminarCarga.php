<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$carga;

	$db->add("carga")->delete($_POST)->exe(function($cod_carga){

		global $carga;

		$carga = array("cod_carga" => $cod_carga);

	})->commit();

	json($carga);


 ?>