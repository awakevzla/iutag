<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$aula;

	$db->add("aula")->update($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = array("cod_aula" => $cod_aula);

	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="MODIFICAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="MODIFICACIÓN DE AULA, AULA: ".$_POST["nombre"];
	registro_operacion($auditoria);
	json($aula);


 ?>