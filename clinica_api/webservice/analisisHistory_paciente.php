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
//$paciente_id = $_GET['paciente_id'];
//$mes = $_GET['mes'];
//$anio = $_GET['anio'];
$paciente_id = json_decode(file_get_contents("php://input")) -> paciente_id;
$mes = json_decode(file_get_contents("php://input")) -> mes;
$anio = json_decode(file_get_contents("php://input")) -> anio;


//$header = get_headers();

try {
    $obj = new analisisHistory();
    $obj->setIdPaciente($paciente_id);
    $obj->setMes($mes);
    $obj->setAnio($anio);
    $resultado = $obj->analisisHistory_paciente();

    $datos = array(
        'id' => $resultado["id"],
        'code' => $resultado["code"],
        'fecha' => $resultado["fecha"],
        'hto' => $resultado["hto"],
        'hb' => $resultado["hb"],
        'ureapre' => $resultado["ureapre"],
        'ureapost' => $resultado["ureapost"],
        'tgo' => $resultado["tgo"],
        'tgp' => $resultado["tgp"],
        'creatinapre' => $resultado["creatinapre"],
        'calcio' => $resultado["calcio"],
        'fosforo' => $resultado["fosforo"],
        'sodio' => $resultado["sodio"],
        'potasio' => $resultado["potasio"],
        'cloro' => $resultado["cloro"],
        'proteinas' => $resultado["proteinas"],
        'albumina' => $resultado["albumina"],
        'globulina' => $resultado["globulina"],
        'hierroserico' => $resultado["hierroserico"],
        'saturacion' => $resultado["saturacion"],
        'ferritina' => $resultado["ferritina"],
        'fosfatasa' => $resultado["fosfatasa"],
        'hepatitisb' => $resultado["hepatitisb"],
        'hiv' => $resultado["hiv"],
        'coretotal' => $resultado["coretotal"],
        'hbsag' => $resultado["hbsag"],
        'vdrl' => $resultado["vdrl"],
//        'transferrina' => $resultado["transferrina"],
        'paratohormona' => $resultado["paratohormona"],
        'achvc' => $resultado["achvc"],
        'id_paciente' => $resultado["id_paciente"],
        'mes' => $resultado["mes"],
        'anio' => $resultado["anio"],
        'paciente' => $resultado["paciente"]
    );
    if ($datos['id'] == null) {
        Funciones::imprimeJSON(203, "No se encontro resultados en la búsqueda", null);

    } else {
        Funciones::imprimeJSON(200, "", $datos);
    }

} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}