<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$db
	->add("seccion")
	->select("*,CONCAT(trayecto.nombre,' ',trimestre.nombre) AS trimestre","seccion,periodo,trimestre,trayecto")
	->where("seccion.cod_periodo = periodo.cod_periodo AND trayecto.cod_trayecto = trimestre.cod_trayecto AND trimestre.cod_trimestre = seccion.cod_trimestre",true)
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>