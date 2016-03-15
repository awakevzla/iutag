<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$usuario;

	$db->add("usuario")->update($_POST)->exe(function($cod_usuario){

		global $usuario;

		$usuario = array("cod_usuario" => $cod_usuario);

	})->commit();

	json($usuario);


 ?>