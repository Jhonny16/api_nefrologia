<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

require_once '../model/usuario.php';
require_once '../util/funciones/Funciones.clase.php';

$dni = json_decode(file_get_contents("php://input")) -> p_dni;
$clave = json_decode(file_get_contents("php://input")) -> p_clave;

//Funciones::imprimeJSON(200, "Bienvenido a la aplicacion", $clave);
if ($dni=="" || $clave==""){
    Funciones::imprimeJSON(500, "Falta completar los datos requeridos", "");
    exit();
}
//$var= json_decode($_POST["p_dni"]);
//$dni = $_POST["p_dni"];
//$request = $_REQUEST["p_dni"];

//$clave = $_POST["p_clave"];

try {
    //Funciones::imprimeJSON(200, "Bienvenido a la aplicacion", $request);
    $objSesion = new usuario();
    $objSesion->setDni($dni);
    $objSesion->setClave($clave);
    $resultado = $objSesion->auth();

    if ($resultado["estado"] == 1) {
        //unset($resultado["estado"]);

        /*Generar un token de seguridad*/
        require_once 'tokengenerar.php';
        $token = generarToken(null,3600);
        $resultado["token"] = $token;
        /*Generar un token de seguridad*/

        Funciones::imprimeJSON(200, "Bienvenido a la aplicacion", $resultado);
    } else {
        Funciones::imprimeJSON(500, $resultado["dato"], "");
    }
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}