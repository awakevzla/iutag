<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$db
	->add("usuario")
	->select()
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>