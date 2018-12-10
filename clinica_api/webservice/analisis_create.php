<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 11:19 AM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/analisisHistory.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$token = $_SERVER["HTTP_TOKEN"];
$p_fecha = json_decode(file_get_contents("php://input")) ->fecha;
$p_hto = json_decode(file_get_contents("php://input")) ->hto;
$p_hb = json_decode(file_get_contents("php://input")) ->hb;
$p_upre = json_decode(file_get_contents("php://input")) ->ureapre;
$p_upost = json_decode(file_get_contents("php://input")) ->ureapost;
$p_tgo = json_decode(file_get_contents("php://input")) ->tgo;
$p_tgp = json_decode(file_get_contents("php://input")) ->tgp;
$p_creatina = json_decode(file_get_contents("php://input")) ->creatinapre;
$p_calcio = json_decode(file_get_contents("php://input")) ->calcio;
$p_fosforo = json_decode(file_get_contents("php://input")) ->fosforo;
$p_sodio = json_decode(file_get_contents("php://input")) ->sodio;
$p_potasio = json_decode(file_get_contents("php://input")) ->potasio;
$p_cloro = json_decode(file_get_contents("php://input")) ->cloro;
$p_prot = json_decode(file_get_contents("php://input")) ->proteinas;
$p_albumina = json_decode(file_get_contents("php://input")) ->albumina;
$p_globulina = json_decode(file_get_contents("php://input")) ->globulina;
$p_hserico = json_decode(file_get_contents("php://input")) ->hierroserico;
$p_saturacion = json_decode(file_get_contents("php://input")) ->saturacion;
$p_ferr = json_decode(file_get_contents("php://input")) ->ferritina;
$p_fosfatasa = json_decode(file_get_contents("php://input")) ->fosfatasa;
$p_hepab = json_decode(file_get_contents("php://input")) ->hepatitisb;
$p_hiv = json_decode(file_get_contents("php://input")) ->hiv;
$p_coretotal = json_decode(file_get_contents("php://input")) ->coretotal;
$p_hbsag = json_decode(file_get_contents("php://input")) ->hbsag;
$p_vdrl = json_decode(file_get_contents("php://input")) ->vdrl;
//$p_transferrina = json_decode(file_get_contents("php://input")) ->transferrina;
$p_paratohormona = json_decode(file_get_contents("php://input")) ->paratohormona;
$p_achvc = json_decode(file_get_contents("php://input")) ->achvc;
$p_seguro = json_decode(file_get_contents("php://input")) ->seguro;
$p_userid = json_decode(file_get_contents("php://input")) ->user_id;

$p_paciente = json_decode(file_get_contents("php://input")) ->id_paciente;
$p_mes = json_decode(file_get_contents("php://input")) ->mes;
$p_anio = json_decode(file_get_contents("php://input")) ->anio;

try {
//    if (validarToken($token)) {

        $obj = new analisisHistory();
        $obj->setFecha($p_fecha);
        $obj->setHto($p_hto);
        $obj->setHb($p_hb);
        $obj->setUreapre($p_upre);
        $obj->setUreapost($p_upost);
        $obj->setTgo($p_tgo);
        $obj->setTgp($p_tgp);
        $obj->setCreatinapre($p_creatina);
        $obj->setCalcio($p_calcio);
        $obj->setFosforo($p_fosforo);
        $obj->setSodio($p_sodio);
        $obj->setPotasio($p_potasio);
        $obj->setCloro($p_cloro);
        $obj->setProteinas($p_prot);
        $obj->setAlbumina($p_albumina);
        $obj->setGlobulina($p_globulina);
        $obj->setHierroserico($p_hserico);
        $obj->setSaturacion($p_saturacion);
        $obj->setFerritina($p_ferr);
        $obj->setFosfatasa($p_fosfatasa);
        $obj->setHepatitisb($p_hepab);
        $obj->setHiv($p_hiv);
        $obj->setCoretotal($p_coretotal);
        $obj->setHbsag($p_hbsag);
        $obj->setVdrl($p_vdrl);
//        $obj->setTransferrina($p_transferrina);
        $obj->setIdPaciente($p_paciente);
        $obj->setMes($p_mes);
        $obj->setAnio($p_anio);
        $obj->setParatohormona($p_paratohormona);
        $obj->setAchvc($p_achvc);
        $obj->setSeguro($p_seguro);
        $obj->setUserId($p_userid);


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