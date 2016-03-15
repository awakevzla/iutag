<?php
session_start(); # iniciamos la sesion
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$string = '';
for ($i = 0; $i < 5; $i++) {
    $string .= $characters[rand(0, strlen($characters) - 1)];
}
$_SESSION['codigo'] = $string; # guardamos el numero en la sesion
# senalamos que el documento va ser una imagen
header("Content-type: image/png");
# declaramos im con la creacion de una imagen
$im = imagecreate(80, 25);
# indicamos el color del fondo (RGB)
$fondo = imagecolorallocate($im, 0, 0, 0); # el color del fondo seria blanco, se puede editar
# indicamos el color del texto (RGB)
$texto = imagecolorallocate($im, 255, 255, 255); # el color de las letras seria blanco, se puede editar
# creacion del texton dentro de la imagen
imagestring($im, 12, 20, 5, $_SESSION['codigo'], $texto);
imagefilter($im, IMG_FILTER_EMBOSS);
# se crea la imagen, la imagen sera PNG
imagepng($im);