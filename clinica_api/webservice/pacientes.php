<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/paciente.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

//$token = $_GET["token"];

//$header = get_headers();

try {
    $a='hola';
    $obj = new paciente();
    $resultado = $obj->lista();

    $lista = array();
    for ($i = 0; $i < count($resultado); $i++) {
        $datos = array(
            "id" => $resultado[$i]["id"],
            "dni" => $resultado[$i]["dni_paciente"],
            "apellidos" => $resultado[$i]["apellidos"],
            "nombres" => $resultado[$i]["nombres"]
        );

        $lista[$i] = $datos;
    }
    Funciones::imprimeJSON(200, "",$lista);
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}