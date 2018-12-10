<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/analisis.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

//$token = $_GET["token"];

//$header = get_headers();

try {
    $obj = new analisis();
    $resultado = $obj->lista();
    Funciones::imprimeJSON(200, "",$resultado);
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}