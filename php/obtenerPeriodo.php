<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$db
	->add("periodo")
	->select()
	->where($_POST)
	->exe(function($data){

		echo json_encode($data[0]);
		
	});
 ?>