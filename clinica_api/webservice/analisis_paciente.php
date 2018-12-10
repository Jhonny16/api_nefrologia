<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:58 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/analisisHistory.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$paciente_id = $_GET["paciente_id"];
$mes = $_GET["mes"];
$anio = $_GET["anio"];

//$header = get_headers();

try {
    $obj = new analisisHistory();
    $obj->setIdPaciente($paciente_id);
    $obj->setMes($mes);
    $obj->setAnio($anio);
    $resultado = $obj->analisisHistoria_paciente();

    $datos = array(
        'id' => $resultado["id"],
        'code' => $resultado["code"],
        'fecha' => $resultado["fecha"],
        'genero' => $resultado["genero"],
        'hierroserico' => $resultado["hierroserico"],
        'ferritina' => $resultado["ferritina"],
//        'transferrina' => $resultado["transferrina"],
        'saturacion' => $resultado["saturacion"],
        'hemoglobina' => $resultado["hb"]
    );
    if ($datos['id'] == null) {
        Funciones::imprimeJSON(203, "No se encontro resultados en la búsqueda", "");

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}