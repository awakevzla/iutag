<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->insert($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = $cod_docente;

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="CREACION DE DOCENTE, NOMBRE Y APELLIDO: ".$_POST["nombre"]." ".$_POST["apellido"];
	registro_operacion($auditoria);
	json($docente);


 ?>