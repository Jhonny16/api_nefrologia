<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/usuario.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$id = json_decode(file_get_contents("php://input")) -> id;


try {
    $obj = new usuario();
    $resultado = $obj->read($id);

    if ($resultado) {
        Funciones::imprimeJSON(200, "", $resultado);
    } else {
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}