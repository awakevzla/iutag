<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$usuario;

	$db->add("usuario")->delete($_POST)->exe(function($cod_usuario){

		global $usuario;

		$usuario = array("cod_usuario" => $cod_usuario);

	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE USUARIO, USUARIO: ".$_POST["usuario"];
	registro_operacion($auditoria);
	json($usuario);


 ?>