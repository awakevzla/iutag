<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$uc;

	$db->add("uc")->delete($_POST)->exe(function($cod_uc){

		global $uc;

		$uc = array("cod_uc" => $cod_uc);

	})->commit();

	json($uc);


 ?>