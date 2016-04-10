<?php
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$aula;
	$db->add("aula")->insert($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = $cod_aula;

	})->commit();

	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="CREACION DE AULA, NOMBRE: ".$_POST["nombre"];
	registro_operacion($auditoria);
	json($aula);


 ?>