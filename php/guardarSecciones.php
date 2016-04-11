<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$db
	->add("seccion")
	->update($_POST)
	->exe(function($data){

		echo json_encode(array("cod_seccion" => $data));
		
	})->commit();
	session_start();
	$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
	$auditoria["evento"]="MODIFICAR";
	$auditoria["ip"]=get_client_ip();
	$auditoria["descripcion"]="MODIFICACIÓN DE SECCIÓN";
	registro_operacion($auditoria);
 ?>