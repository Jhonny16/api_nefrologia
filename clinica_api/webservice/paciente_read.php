<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require_once '../model/paciente.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$id = json_decode(file_get_contents("php://input"))->id;
//$id = $_GET['id'];


try {
    $obj = new paciente();
    $obj->setId($id);
    $resultado = $obj->read();

    $datos = array(
        "id" => $resultado["id"],
        "dni" => $resultado["dni_paciente"],
        "apellidos" => $resultado["apellidos"],
        "nombres" => $resultado["nombres"],
        "seguro" => $resultado["tipo_seguro"],
        "genero" => $resultado["genero"],
        "email" => $resultado["email"],
        "telefono" => $resultado["telefono"],
        "direccion" => $resultado["direccion"],
        "estado" => $resultado["estado"],
        "user_id" => $resultado["id_usuario"]
    );
    if ($datos['id'] == null) {
        Funciones::imprimeJSON(203, "No se encontro resultados en la búsqueda", "");

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}