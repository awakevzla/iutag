<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$data = array(
		"search" => "%$_POST[search]%",
		"cod_periodo" => $_POST["cod_periodo"],
		"dia_semana" => $_POST["dia_semana"],
		"hora_entrada" => $_POST["hora_entrada"],
		"cod_asignacion" => isset($_POST["cod_asignacion"])?$_POST["cod_asignacion"]:0,
		"hora_salida" => $_POST["hora_salida"]
		);

	$db
	->add("aula")
	->select("*,nombre AS label")
	->where("nombre like :search AND cod_aula NOT IN (SELECT cod_aula FROM asignacion,carga,seccion WHERE cod_asignacion!=:cod_asignacion AND dia_semana = :dia_semana AND cod_periodo = :cod_periodo AND (CAST(:hora_entrada AS time) BETWEEN hora_entrada AND hora_salida OR CAST(:hora_salida AS time) BETWEEN hora_entrada AND hora_salida) AND carga.cod_seccion = seccion.cod_seccion AND carga.cod_carga = asignacion.cod_carga)", true, $data)
	->exe(function($data){

		echo json_encode($data);
		
	});
 ?>