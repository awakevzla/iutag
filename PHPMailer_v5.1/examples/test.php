<?php
require '../class.phpmailer.php';
require '../class.smtp.php'; //incluimos la clase para envíos por SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com"; //servidor smtp
$mail->Port = 465; //puerto smtp de gmail
$mail->Username = 'sadcaiutag@gmail.com';
$mail->Password = '123abc__';

$mail->FromName = 'sadcaiutag@gmail.com';
$mail->From = '123abc__';//email de remitente desde donde se envía el correo.

$mail->AddAddress("robertty55@gmail.com", 'Destinatario');//destinatario que va a recibir el correo

/*$mail->AddCC("$correo_emp", 'copia');//envía una copia del correo a la dirección especificada

$mail->AddCC('recepcionvtelca@gmail.com', 'copia');//envía una copia del correo a la dirección especificada*/


$mail->Subject = 'Restauración de Contraseña';

$mail->AltBody = 'Sistema administrativo de carga académica (SADCA)';//cuerpo con texto plano

$mail->MsgHTML("Su contraseña es: 1231231213213");//cuerpo con html
if(!$mail->Send()) {//finalmente enviamos el email
    echo $mail->ErrorInfo;//si no se envía correctamente se muestra el error que ocurrió
} else {
    echo 'Correo enviado correctamente!!!';
}