<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/analisisHistory.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';
require_once '../reportes/Help.php';


if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$mes1 = $_GET["mes1"];
$mes2 = $_GET["mes2"];
$anio1 = $_GET["anio1"];
$anio2 = $_GET["anio2"];
$param = $_GET["param"];
$bajo = $_GET["bajo"];
$paciente_id = $_GET["paciente_id"];
$usuario = $_GET["usuario"];

try {
    $obj = new analisisHistory();
    $resultado = $obj->lista_vista($mes1,$mes2,$anio1,$anio2,$param , $bajo,$paciente_id);
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}

if($paciente_id == 0){
    $paciente = 'Todos los pacientes';
}else{
    $paciente = $resultado[0]["paciente"];
}


$htmlDatos = '  
<table style="font-size:11px;width:100%">
    <thead>
         <tr style="background-color: #f9f9f9; height:25px;">
            <th style="color:#26B99A">#</th>
            <th style="color:#26B99A">CODE</th>
            <th style="color:#26B99A">HTO</th>
            <th style="color:#26B99A">HB</th>
            <th style="color:#26B99A">UPRE</th>
            <th style="color:#26B99A">UPOST</th>
            <th style="color:#26B99A">TGO</th>
            <th style="color:#26B99A">TGP</th>
            <th style="color:#26B99A">CREAT</th>
            <th style="color:#26B99A">CALCIO</th>
            <th style="color:#26B99A">FOS</th>
            <th style="color:#26B99A">SOD</th>
            <th style="color:#26B99A">POT</th>
            <th style="color:#26B99A">CLO</th>
            <th style="color:#26B99A">PRO</th>
            <th style="color:#26B99A">ALB</th>
            <th style="color:#26B99A">GLOB</th>
            <th style="color:#26B99A">SERICO</th>
            <th style="color:#26B99A">SAT</th>
            <th style="color:#26B99A">FERR</th>
            <th style="color:#26B99A">FOSF</th>
            <th style="color:#26B99A">HEPB</th>
            <th style="color:#26B99A">HIV</th>
            <th style="color:#26B99A">CORE</th>
            <th style="color:#26B99A">HBSAG</th>
            <th style="color:#26B99A">PARAT</th>
            <th style="color:#26B99A">VDRL</th>
            <th style="color:#26B99A">SEGURO</th>
            <th style="color:#26B99A">PACIENTE</th>          
        </tr>
    </thead>
    <tbody >';
$num = 0;
for ($i=0; $i<count($resultado);$i++) {
    $num++;

    $htmlDatos .= '<tr>';
    $htmlDatos .= '<td>'. $num .'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["code"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hto"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hb"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["ureapre"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["ureapost"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["tgo"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["tgp"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["creatinapre"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["calcio"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["fosforo"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["sodio"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["potasio"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["cloro"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["proteinas"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["albumina"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["globulina"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hierroserico"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["saturacion"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["ferritina"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["fosfatasa"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hepatitisb"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hiv"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["coretotal"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["hbsag"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["paratohormona"].'</td>';
    if($resultado[$i]["paratohormona"] == null){
        $htmlDatos .= '<td>-</td>';
    }else{
        $htmlDatos .= '<td>'.$resultado[$i]["vdrl"].'</td>';
    }
    $htmlDatos .= '<td>'.$resultado[$i]["seguro"].'</td>';
    $htmlDatos .= '<td>'.$resultado[$i]["paciente"].'</td>';
    $htmlDatos .='</tr>';
}
$htmlDatos .= '</tbody></table>';

//echo $htmlDatos;
$titulo = 'REPORTE: HISTORIA DE ANALISIS';
$htmlReporte = Help::export_pdf(utf8_encode($htmlDatos), $usuario, $titulo , $paciente);
$result = Help::generarReporte($htmlReporte, 2, "report_analisishistory");
if ($result){
    Funciones::imprimeJSON(200, "Se ha generado el reporte satisfactoriamente","");
}
