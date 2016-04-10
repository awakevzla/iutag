<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$uc;

	$db->add("uc")->delete($_POST)->exe(function($cod_uc){

		global $uc;

		$uc = array("cod_uc" => $cod_uc);

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="REGISTRAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE UNIDAD CURRICULAR, NOMBRE: ".$_POST["nombre_uc"];
	registro_operacion($auditoria);
	json($uc);


 ?>