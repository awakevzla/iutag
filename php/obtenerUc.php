<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("uc")
	->select("*,CONCAT(trayecto.nombre,' ',trimestre.nombre) AS trimestre","uc,trimestre,trayecto")
	->where("uc.cod_trimestre = trimestre.cod_trimestre AND trayecto.cod_trayecto = trimestre.cod_trayecto AND CONCAT(uc.nombre_uc,trayecto.cod_trayecto) = (SELECT CONCAT(nombre_uc,cod_trayecto) FROM uc,trimestre WHERE cod_uc = :cod_uc AND uc.cod_trimestre = trimestre.cod_trimestre) ORDER BY cod_uc ASC LIMIT 1",true,$_POST)
	->exe(function($uc){

		echo json_encode($uc[0]);
		
	});

 ?>