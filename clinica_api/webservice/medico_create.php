<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 9:42 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/usuario.php';
require_once '../model/medico.php';
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
$rne = json_decode(file_get_contents("php://input"))->rne;
$user_id = json_decode(file_get_contents("php://input"))->user_id;
$medico_id = json_decode(file_get_contents("php://input"))->medico_id;
$cmp = json_decode(file_get_contents("php://input"))->cmp;
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
            $objmed = new medico();
            $objmed->setDni($dni);
            $objmed->setMe($rne);
            $objmed->setCmp($cmp);
            $objmed->setApellidos($apellidos);
            $objmed->setNombres($nombres);
            $objmed->setEmail($email);
            $objmed->setTelefono($telefono);
            $objmed->setEstado($estado);
            $objmed->setIdUsuario($id);

            $result = $objmed->create();
            if ($result) {
                Funciones::imprimeJSON(200, "Se Agrego Correctamente", "");
            } else {
                Funciones::imprimeJSON(203, "Error al momento de agregar", "");
            }

        }
    } else {
        $objmed = new medico();
        $objmed->setDni($dni);
        $objmed->setMe($rne);
        $objmed->setCmp($cmp);
        $objmed->setApellidos($apellidos);
        $objmed->setNombres($nombres);
        $objmed->setEmail($email);
        $objmed->setTelefono($telefono);
        $objmed->setEstado($estado);
        $objuser->setId($user_id);
        $objuser->setEstado($estado);
        $objuser->setNombre($nombre);
        $objuser->setDni($dni);
        $objmed->setId($medico_id);
        $objuser->update_estado();
        $result = $objmed->update();
        if ($result) {
            Funciones::imprimeJSON(200, "Se Actualizo Correctamente", "");
        } else {
            Funciones::imprimeJSON(203, "Error al momento de agregar", "");
        }


    }


} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}