<?php
session_start();
$valor=$_REQUEST["valor"];
if ($valor==$_SESSION["codigo"])
    echo 1;
else
    echo 0;