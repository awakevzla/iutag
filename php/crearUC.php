<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	for ($i=0; $i < $_POST["cantidad"]; $i++) { 

		$uc;

		$db->add("uc")->insert($_POST)->exe(function($cod_uc){

			global $uc, $i;

			if($i == 0){

				$uc = $cod_uc;

			}

		});

		$_POST["cod_trimestre"]++;

	}

	$db->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="CREACION DE UNIDAD CURRICULAR, NOMBRE: ".$_POST["nombre_uc"];
	registro_operacion($auditoria);
	json($uc);


 ?>