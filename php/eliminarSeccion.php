<?php
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$seccion;

	$db->add("seccion")->delete($_POST)->exe(function($cod_seccion){

		global $seccion;

		$seccion = array("cod_seccion" => $cod_seccion);

	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE SECCION, CODIGO: ".$_POST["cod_seccion"];
	registro_operacion($auditoria);
	json($seccion);


 ?>