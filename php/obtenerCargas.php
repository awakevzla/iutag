<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$carga;

	$db
	->add("carga")
	->select("*,CONCAT(trayecto.nombre,' ',trimestre.nombre) AS trimestre","carga, seccion, uc, periodo,trimestre,trayecto")
	->where("trayecto.cod_trayecto = trimestre.cod_trayecto AND trimestre.cod_trimestre = seccion.cod_trimestre AND carga.cod_uc = uc.cod_uc AND carga.cod_seccion = seccion.cod_seccion AND periodo.cod_periodo = seccion.cod_periodo",true)
	->exe(function($data){

		global $carga;

		$carga = $data;
		
	});

	for ($i=0; $i < count($carga); $i++) { 
		
		$carga[$i];

		if($carga[$i]["cod_docente"] != NULL){

			$db
			->add("docente")
			->select("CONCAT(nombre,' ',apellido) AS nombre_docente")
			->where(array("cod_docente"=>$carga[$i]["cod_docente"]))
			->exe(function($docente){

				global $carga,$i;

				$carga[$i] = array_merge($docente[0],$carga[$i]);
				
			});

		}

	}

	json($carga);

 ?>