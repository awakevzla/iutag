<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

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
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="CREACION DE SECCIONES";
	registro_operacion($auditoria);
	json($seccion);


 ?>