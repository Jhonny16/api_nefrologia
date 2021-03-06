<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/enfermera.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$id = json_decode(file_get_contents("php://input")) -> id;


try {
    $obj = new enfermera();
    $obj->setId($id);
    $resultado = $obj->read();

    $datos = array(
        "id" => $resultado["id"],
        "dni" => $resultado["dni"],
        "cep" => $resultado["cep"],
        "apellidos" => $resultado["apellidos"],
        "nombres" => $resultado["nombres"],
        "email" => $resultado["email"],
        "telefono" => $resultado["telefono"],
        "estado" => $resultado["estado"],
        "user_id" => $resultado["usuario_id"]
    );
    if ($datos['id'] == null) {
        Funciones::imprimeJSON(203, "No se encontro resultados en la búsqueda", "");

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}