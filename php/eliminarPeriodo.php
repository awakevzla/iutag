<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$periodo;

	$db->add("periodo")->delete($_POST)->exe(function($cod_periodo){

		global $periodo;

		$periodo = array("cod_periodo" => $cod_periodo);

	})->commit();

	json($periodo);


 ?>