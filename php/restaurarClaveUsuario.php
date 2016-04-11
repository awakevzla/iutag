<?php

include "mysql.php";
include "parametrosBD.php";
$db = new db(usuario,clave);
require '../PHPMailer_v5.1/class.phpmailer.php';
require '../PHPMailer_v5.1/class.smtp.php'; //incluimos la clase para envíos por SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com"; //servidor smtp
$mail->Port = 465; //puerto smtp de gmail
$mail->Username = 'sadcaiutag@gmail.com';
$mail->Password = '123abc__';

$usuario;

$stringSimbol="$&*#!¡?¿[]%@><";
$stringCharMin="qwertyuiopasdfghjklzxcvbnm";
$stringCharMay=strtoupper("qwertyuiopasdfghjklzxcvbnm");
$stringNumber="1234567890";
$clave = '';
for ($i = 0; $i < 2; $i++) {
    $clave .= $stringSimbol[rand(0, strlen($stringSimbol) - 1)];
}
for ($i = 0; $i < 2; $i++) {
    $clave .= $stringCharMin[rand(0, strlen($stringCharMin) - 1)];
}
for ($i = 0; $i < 2; $i++) {
    $clave .= $stringCharMay[rand(0, strlen($stringCharMay) - 1)];
}
for ($i = 0; $i < 2; $i++) {
    $clave .= $stringNumber[rand(0, strlen($stringNumber) - 1)];
}
/**
 * Seteamos la Clave Aleatoria
 */
$_POST["clave"]=md5($clave);

$mail->FromName = 'sadcaiutag@gmail.com';
$mail->From = '123abc__';//email de remitente desde donde se envía el correo.

$mail->AddAddress($_POST["correo"], 'Destinatario');//destinatario que va a recibir el correo


$mail->Subject = 'Restauración de Contraseña - SADCA IUTAG';

$mail->AltBody = 'Sistema administrativo de carga académica (SADCA)';//cuerpo con texto plano

$mail->MsgHTML("Su contraseña es:".$clave);//cuerpo con html
if(!$mail->Send()) {//finalmente enviamos el email
    $respuesta["respuesta"]=0;
    $respuesta["error"]=$mail->ErrorInfo;//si no se envía correctamente se muestra el error que ocurrió
    echo json_encode($respuesta);
} else {
    $db->add("usuario")->update($_POST)->exe(function($cod_usuario){

        global $usuario;

        $usuario = array("cod_usuario" => $cod_usuario);

    })->commit();
    session_start();
    $auditoria["id_usuario"]=$_SESSION["usuario"]["cod_usuario"];
    $auditoria["evento"]="MODIFICAR";
    $auditoria["ip"]=get_client_ip();
    $auditoria["descripcion"]="RESTAURACIÓN DE CLAVE, CODIGO USUARIO:".$_POST["cod_usuario"];
    registro_operacion($auditoria);

    json($usuario);
}


?>