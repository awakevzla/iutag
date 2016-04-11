<?php
include "mysql.php";
include "parametrosBD.php";
$db = new db(usuario,clave);

$datos;
$usuarios;
$arrayUsers=array();
$andTipo="";
$andUsuario="";
if ($_REQUEST["tipo_reporte"]==1){
    $andTipo="AND evento in ('INGRESO', 'SALIDA')";
}else if ($_REQUEST["tipo_reporte"]==2){
    $andTipo="AND evento not in ('INGRESO', 'SALIDA')";
}else{
    $andTipo="";
}
if ($_REQUEST["usuario"]!=0){
    $andUsuario="AND id_usuario=".$_REQUEST["usuario"];
}
$db
    ->add("auditoria_sesion")
    ->select()
    ->where("(date(fecha) between '".$_REQUEST["fecha_inicio"]."' and '".$_REQUEST["fecha_fin"]."') $andTipo $andUsuario", true)
    ->exe(function($data){
        global $datos;
        $datos=$data;

    });

$db
    ->add("usuario")
    ->select()
    ->exe(function($data){
        global $usuarios;
        $usuarios=$data;

    });
foreach($usuarios as $k=>$v){
    $arrayUsers[$v["cod_usuario"]]["nombre_apellido"]=$v["nombre"]." ".$v["apellido"];
}
?>
    <page id="asd" backtop="30mm" backbottom="10mm" backleft="10mm" backright="20mm">
        <page_header>
            <table style="width: 100%;">
                <tr>
                    <td><img style="width:100%;" src="../img/cintillo.png"></td>
                </tr>
            </table>
        </page_header>
        <page_footer>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left;width: 33%">Sistema Integral de Trabajadores y Trabajadoras</td>
                    <td style="text-align: center;width: 33%">Fecha <?php echo date('d-m-y h:i:s'); ?></td>
                    <td style="text-align: right;width: 33%">Página [[page_cu]]/[[page_nb]]</td>
                </tr>
            </table>
        </page_footer>
        <table id='tabla' style="border-collapse: collapse;" border="1" align="center">
            <thead>
            <tr>
                <th style='width: 50px;'>#</th>
                <th style='width: 150px;'>Nombre y Apellido</th>
                <th style='width: 150px;'>Fecha</th>
                <th style='width: 150px;'>Evento</th>
                <th style='width: 150px;'>Ip</th>
                <th style='width: 150px;'>Descripcion</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont=1;
            foreach($datos as $k=>$v){
                $usuario=(isset($arrayUsers[$v["id_usuario"]]["nombre_apellido"]))?$arrayUsers[$v["id_usuario"]]["nombre_apellido"]:"Usuario Eliminado ID: ".$v["id_usuario"];
                $ip=($v["ip"]=="::1")?"Local":$v["ip"];
                echo "<tr>";
                echo "<td style='width: 50px;'>".$cont."</td>";
                echo "<td style='width: 150px;'>".$usuario."</td>";
                echo "<td style='width: 150px;'>".$v["fecha"]."</td>";
                echo "<td style='width: 150px;'>".$v["evento"]."</td>";
                echo "<td style='width: 150px;'>".$ip."</td>";
                echo "<td style='width: 150px;'>".$v["descripcion"]."</td>";
                echo "</tr>";
                $cont++;
            }
            ?>
            </tbody>
        </table>
    </page>