<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$usuario;
	$_POST["clave"]=md5($_POST["clave"]);
	$db->add("usuario")->insert($_POST)->exe(function($cod_usuario){

		global $usuario;

		$usuario = $cod_usuario;

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="CREACION DE USUARIO DEL USUARIO, LOGIN: ".$_POST["usuario"];
	registro_operacion($auditoria);

	json($usuario);


 ?>