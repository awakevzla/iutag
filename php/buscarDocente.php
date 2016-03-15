<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$buscar = array('search' => "%$_POST[search]%");

	$db
	->add("docente")
	->select("*,CONCAT(nombre,' ',apellido,' ',cedula) AS label","docente")
	->where("CONCAT(nombre,' ',apellido) like :search OR cedula like :search", true, $buscar)
	->exe(function($data){

		global $db;

		for ($i=0; $i < count($data); $i++) {
			
			$db
			->add("docente")
			->select("*","asignacion,carga,seccion")
			->where("cod_periodo = :cod_periodo AND seccion.cod_seccion = carga.cod_seccion AND asignacion.cod_carga = carga.cod_carga AND cod_docente = :cod_docente",true,array("cod_docente"=>$data[$i]["cod_docente"],"cod_periodo"=>$_POST["cod_periodo"]))
			->exe(function($asig){

				$GLOBALS["asig"] = $asig;

			});

			$data[$i]["asignaciones"]=$GLOBALS["asig"];

		}

		echo json_encode($data);
		
	});
 ?>