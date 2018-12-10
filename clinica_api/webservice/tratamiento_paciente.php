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

$paciente_id = json_decode(file_get_contents("php://input")) -> paciente_id;
$mes = json_decode(file_get_contents("php://input")) -> mes;
$anio = json_decode(file_get_contents("php://input")) -> anio;

//$paciente_id = $_GET["paciente_id"];
//$mes = $_GET["mes"];
//$anio = $_GET["anio"];

//$header = get_headers();

try {
    $obj = new tratamiento();
    $resultado = $obj->tratamiento_paciente($paciente_id, $mes, $anio);

    $datos = array(
        'id' => $resultado["id"],
        'paciente' => $resultado["paciente"],
        'fecha' => $resultado["fecha"],
        'diagnostico' => $resultado["diagnostico"],
        'trato' => $resultado["trato"]
    );
    if ($datos['id'] == null) {
        Funciones::imprimeJSON(203, "No se encontro resultados en la búsqueda", "");

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}