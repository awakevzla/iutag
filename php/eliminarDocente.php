<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$docente;

	$db->add("docente")->delete($_POST)->exe(function($cod_docente){

		global $docente;

		$docente = array("cod_docente" => $cod_docente);

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE DOCENTE, NOMBRE Y APELLIDO: ".$_POST["nombre"]." ".$_POST["apellido"];
	registro_operacion($auditoria);
	json($docente);


 ?>