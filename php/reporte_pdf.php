<?php
ob_start();
include('reporte.php');
$content = ob_get_clean();
require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L', 'letter', 'es', true, 'UTF-8');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('Reporte_Ubicaciones.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>