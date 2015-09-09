<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	for ($i=0; $i < $_POST["nro_seccion"]; $i++) { 

		$seccion;

		$_POST["nro"]=$_POST["nro_serie"].($i+1);

		$db->add("seccion")->insert($_POST)->exe(function($cod_seccion){

			global $seccion, $i, $db;

			$db->execute("INSERT INTO carga (cod_seccion,cod_uc) SELECT :cod_seccion,cod_uc FROM uc WHERE cod_trimestre = :cod_trimestre",
				array("cod_seccion" => $cod_seccion["cod_seccion"],"cod_trimestre" => $_POST["cod_trimestre"]),
				function($data){

				},"carga"
			);

			if($i == 0){

				$seccion = $cod_seccion;

			}

		});

		

	}

	$db->commit();

	json($seccion);


 ?>