<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$aula;

	$db->add("aula")->delete($_POST)->exe(function($cod_aula){

		global $aula;

		$aula = array("cod_aula" => $cod_aula);

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE AULA: ".$_POST["nombre"];
	registro_operacion($auditoria);
	json($aula);


 ?>