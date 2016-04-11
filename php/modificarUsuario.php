<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);
	if (isset($_POST["clave_actual"]) and isset($_POST["clave_anterior"]) and isset($_POST["clave"])){
		if ($_POST["clave_actual"]!=md5($_POST["clave_anterior"])) {
			die("clave_anterior_invalida");
		}else{
			$_POST["clave"]=md5($_POST["clave"]);
		}
	}
	$usuario;

	$db->add("usuario")->update($_POST)->exe(function($cod_usuario){

		global $usuario;
		if (isset($_POST["clave"]))
			$usuario = array("cod_usuario" => $cod_usuario, "clave_nueva"=>$_POST["clave"]);
		else
			$usuario = array("cod_usuario" => $cod_usuario);

	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="MODIFICAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="MODIFICACIÓN DE USUARIO, LOGIN: ".$_POST["usuario"].", NOMBRE Y APELLIDO: ".$_POST["nombre"]." ".$_POST["apellido"];
	registro_operacion($auditoria);
	json($usuario);


 ?>