<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("uc")
	->select("*,CONCAT(trayecto.nombre,' ',trimestre.nombre) AS trimestre","uc,trimestre,trayecto")
	->where("uc.cod_trimestre = trimestre.cod_trimestre AND trayecto.cod_trayecto = trimestre.cod_trayecto",true)
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>