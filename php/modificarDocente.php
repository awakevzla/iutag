<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->update($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = array("cod_docente" => $cod_docente);

	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="MODIFICAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="MODIFICACIÓN DE DOCENTE, DOCENTE: ".$_POST["nombre"]." ".$_POST["apellido"];
	registro_operacion($auditoria);
	json($docente);


 ?>