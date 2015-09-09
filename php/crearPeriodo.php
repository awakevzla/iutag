<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$periodo;

	$db->add("periodo")->insert($_POST)->exe(function($cod_periodo){

		global $periodo;

		$periodo = $cod_periodo;

	})->commit();

	json($periodo);


 ?>