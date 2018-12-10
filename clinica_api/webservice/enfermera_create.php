<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 9:42 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/usuario.php';
require_once '../model/enfermera.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$token = $_SERVER["HTTP_TOKEN"];
$tipo = json_decode(file_get_contents("php://input"))->tipo;
$nombre = json_decode(file_get_contents("php://input"))->nombre;
$dni = json_decode(file_get_contents("php://input"))->dni;
$clave = json_decode(file_get_contents("php://input"))->clave;
$cep = json_decode(file_get_contents("php://input"))->cep;
$user_id = json_decode(file_get_contents("php://input"))->user_id;
$enfermera_id = json_decode(file_get_contents("php://input"))->enfermera_id;
$apellidos = json_decode(file_get_contents("php://input"))->apellidos;
$nombres = json_decode(file_get_contents("php://input"))->nombres;
$email = json_decode(file_get_contents("php://input"))->email;
$telefono = json_decode(file_get_contents("php://input"))->telefono;
$estado = json_decode(file_get_contents("php://input"))->estado;
$operation = json_decode(file_get_contents("php://input"))->operation;

try {
//    if (validarToken($token)) {

    $objuser = new usuario();
    $objuser->setTipo($tipo);
    $objuser->setNombre($nombre);
    $objuser->setDni($dni);
    $objuser->setClave($clave);
    $objuser->setEstado($estado);


    if ($operation == 'Nuevo') {
        $id = $objuser->create();
        if ($id > 1) {
            $objenf = new enfermera();
            $objenf->setDni($dni);
            $objenf->setCep($cep);
            $objenf->setApellidos($apellidos);
            $objenf->setNombres($nombres);
            $objenf->setEmail($email);
            $objenf->setTelefono($telefono);
            $objenf->setEstado($estado);
            $objenf->setIdUsuario($id);

            $result = $objenf->create();
            if ($result) {
                Funciones::imprimeJSON(200, "Se Agrego Correctamente", "");
            } else {
                Funciones::imprimeJSON(203, "Error al momento de agregar", "");
            }

        }
    } else {
        $objenf = new enfermera();
        $objenf->setDni($dni);
        $objenf->setCep($cep);
        $objenf->setApellidos($apellidos);
        $objenf->setNombres($nombres);
        $objenf->setEmail($email);
        $objenf->setTelefono($telefono);
        $objenf->setEstado($estado);
        $objuser->setId($user_id);
        $objuser->setEstado($estado);
        $objuser->setDni($dni);
        $objuser->setNombre($nombre);
        $objenf->setId($enfermera_id);
        $objuser->update_estado();
        $result = $objenf->update();
        if ($result) {
            Funciones::imprimeJSON(200, "Se Actualizo Correctamente", "");
        } else {
            Funciones::imprimeJSON(203, "Error al momento de agregar", "");
        }


    }


} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}