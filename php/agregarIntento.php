<?php
include "mysql.php";
include "parametrosBD.php";
$cant=get_tries($_POST["usuario"]);
addTry($_POST["usuario"]);
if ($cant>=3){
    ban_user($_POST["usuario"]);
}
