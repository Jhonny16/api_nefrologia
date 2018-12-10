<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 9:42 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/tratamiento.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$token = $_SERVER["HTTP_TOKEN"];
$p_descripcion = json_decode(file_get_contents("php://input")) ->descripcion;
$p_fecha = json_decode(file_get_contents("php://input")) ->fecha;
$p_regla_id = json_decode(file_get_contents("php://input")) ->regla_id;
$p_paciente_id = json_decode(file_get_contents("php://input")) ->paciente_id;
$p_usuario_id = json_decode(file_get_contents("php://input")) ->usuario_id;

try {
//    if (validarToken($token)) {

    $obj = new tratamiento();
    $obj->setDescripcion($p_descripcion);
    $obj->setFecha($p_fecha);
    $obj->setReglaId($p_regla_id);
    $obj->setPacienteId($p_paciente_id);
    $obj->setUsuarioId($p_usuario_id);

    $resultado = $obj->create();
    if($resultado){
        Funciones::imprimeJSON(200, "Se Agrego Correctamente", "");
    }else{
        Funciones::imprimeJSON(203, "Error al momento de agregar", "");
    }
//    }
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}