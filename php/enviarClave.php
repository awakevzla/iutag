<?php
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

$datos=array();
include "mysql.php";
include "parametrosBD.php";
$db = new db(usuario,clave);
$db
    ->add("usuario")
    ->select()
    ->where($_POST)
    ->exe(function($data){
        global $datos;
        $datos=$data[0];
    });

$mail->FromName = 'sadcaiutag@gmail.com';
$mail->From = '123abc__';//email de remitente desde donde se envía el correo.

$mail->AddAddress($datos["correo"], 'Destinatario');//destinatario que va a recibir el correo

/*$mail->AddCC("$correo_emp", 'copia');//envía una copia del correo a la dirección especificada

$mail->AddCC('recepcionvtelca@gmail.com', 'copia');//envía una copia del correo a la dirección especificada*/


$mail->Subject = 'Restauración de Contraseña - SADCA IUTAG';

$mail->AltBody = 'Sistema administrativo de carga académica (SADCA)';//cuerpo con texto plano

$mail->MsgHTML("Su contraseña es: ".$datos["clave"]);//cuerpo con html
if(!$mail->Send()) {//finalmente enviamos el email
    $respuesta["respuesta"]=0;
    $respuesta["error"]=$mail->ErrorInfo;//si no se envía correctamente se muestra el error que ocurrió
    echo json_encode($respuesta);
} else {
    $respuesta["respuesta"]=1;
    echo json_encode($respuesta);
}