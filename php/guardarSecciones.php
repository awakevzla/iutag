<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$db
	->add("seccion")
	->update($_POST)
	->exe(function($data){

		echo json_encode(array("cod_seccion" => $data));
		
	})->commit();
 ?>