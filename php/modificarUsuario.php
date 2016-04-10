<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);
	if (!$_POST["clave_anterior"]==md5($_POST["clave"])) {
		die("clave_anterior_invalida");
	}else{
		$_POST["clave"]=md5($_POST["clave"]);
	}
	$usuario;

	$db->add("usuario")->update($_POST)->exe(function($cod_usuario){

		global $usuario;

		$usuario = array("cod_usuario" => $cod_usuario, "clave_nueva"=>$_POST["clave"]);

	})->commit();

	json($usuario);


 ?>