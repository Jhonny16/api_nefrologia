<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require_once '../model/analisisHistory.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$id = json_decode(file_get_contents("php://input"))->id;



try {
    $obj = new analisisHistory();
    $obj->setIdPaciente($id);
    $resultado = $obj->find_analisisHistory();

    $datos = array(
        "row" => $resultado["row"]
    );
    if ($datos['row'] == "0") {
        Funciones::imprimeJSON(203, "Es Paciente Nuevo", "");

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}