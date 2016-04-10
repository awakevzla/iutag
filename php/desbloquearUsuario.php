<?php
session_start();
include "mysql.php";
include "parametrosBD.php";
$db = new db(usuario,clave);

$usuario;

$db->add("usuario")->update($_POST)->exe(function($cod_usuario){

	global $usuario;

	$usuario = array("cod_usuario" => $cod_usuario);

})->commit();
$auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
$auditoria["evento"]="MODIFICAR";
$auditoria["ip"]=get_client_ip();
$auditoria["descripcion"]="DESBLOQUEO DE USUARIO ID: ".$_POST["cod_usuario"];
registro_operacion($auditoria);
json($usuario);


?>