<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	$usuario;

	$db->add("usuario")->delete($_POST)->exe(function($cod_usuario){

		global $usuario;

		$usuario = array("cod_usuario" => $cod_usuario);

	})->commit();

	json($usuario);


 ?>