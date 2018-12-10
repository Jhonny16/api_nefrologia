<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 9:42 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/regla.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$token = $_SERVER["HTTP_TOKEN"];
$p_sexo = json_decode(file_get_contents("php://input")) ->sexo;
$p_diagnostico = json_decode(file_get_contents("php://input")) ->diagnostico;
$p_tratamiento = json_decode(file_get_contents("php://input")) ->tratamiento;
$p_analisis = json_decode(file_get_contents("php://input")) ->analisis;
$p_sintomas = json_decode(file_get_contents("php://input")) ->sintomas;

try {
//    if (validarToken($token)) {

    $obj = new regla();
    $obj->setSexo($p_sexo);
    $obj->setDiagnostico($p_diagnostico);
    $obj->setTratamiento($p_tratamiento);
    $obj->setAnalisis($p_analisis);
    $obj->setSintomas($p_sintomas);


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