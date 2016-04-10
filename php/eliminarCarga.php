<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$carga;

	$db->add("carga")->delete($_POST)->exe(function($cod_carga){

		global $carga;

		$carga = array("cod_carga" => $cod_carga);

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE CARGA, CODIGO: ".$_POST["cod_carga"];
	registro_operacion($auditoria);
	json($carga);


 ?>