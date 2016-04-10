<?php 
	session_start();
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$periodo;

	$db->add("periodo")->delete($_POST)->exe(function($cod_periodo){

		global $periodo;

		$periodo = array("cod_periodo" => $cod_periodo);

	})->commit();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="ELIMINAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="ELIMINACION DE PERIODO, FECHA INICIO: ".$_POST["fecha_inicio"].", FECHA CULMINACION: ".$_POST["fecha_culminacion"];
	registro_operacion($auditoria);
	json($periodo);


 ?>