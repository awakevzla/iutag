<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$_POST['search']="%$_POST[search]%";	

	$db
	->add("trayecto")
	->select("
		cod_trimestre, 
		trimestre.nombre AS trimestre, 
		trayecto.cod_trayecto,  
		trayecto.nombre AS trayecto,
		CONCAT(trayecto.nombre, ' ', trimestre.nombre) AS label","trimestre, trayecto")
	->where("trayecto.cod_trayecto = trimestre.cod_trayecto", true, $_POST)
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>