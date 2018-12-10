<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/tratamiento.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$fecha_inicio = $_GET["fecha_inicio"];
$fecha_fin  = $_GET["fecha_fin"];
$param = $_GET["param"];

try {
    $obj = new tratamiento();
    $resultado = $obj->lista($fecha_inicio,$fecha_fin,$param);
    Funciones::imprimeJSON(200, "",$resultado);
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}