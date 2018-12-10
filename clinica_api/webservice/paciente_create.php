<?php
/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 9:42 PM
 */
header('Access-Control-Allow-Origin: *');

require_once '../model/usuario.php';
require_once '../model/paciente.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'tokenvalidar.php';

if (!isset($_SERVER["HTTP_TOKEN"])) {
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}
$token = $_SERVER["HTTP_TOKEN"];
$user_id = json_decode(file_get_contents("php://input"))->user_id;
$clave = json_decode(file_get_contents("php://input"))->clave;
$paciente_id = json_decode(file_get_contents("php://input"))->paciente_id;
$tipo = json_decode(file_get_contents("php://input"))->tipo;
$nombre = json_decode(file_get_contents("php://input"))->nombre;

$operation = json_decode(file_get_contents("php://input"))->operation;
$dni = json_decode(file_get_contents("php://input"))->dni;
$seguro = json_decode(file_get_contents("php://input"))->seguro;
$apellidos = json_decode(file_get_contents("php://input"))->apellidos;
$nombres = json_decode(file_get_contents("php://input"))->nombres;
$email = json_decode(file_get_contents("php://input"))->email;
$genero = json_decode(file_get_contents("php://input"))->genero;
$telefono = json_decode(file_get_contents("php://input"))->telefono;
$direccion = json_decode(file_get_contents("php://input"))->direccion;
$estado = json_decode(file_get_contents("php://input"))->estado;
$autogenerado = json_decode(file_get_contents("php://input"))->autogenerado;



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
            $objpac = new paciente();
            $objpac->setDni($dni);
            $objpac->setSeguro($seguro);
            $objpac->setApellidos($apellidos);
            $objpac->setNombres($nombres);
            $objpac->setEmail($email);
            $objpac->setGenero($genero);
            $objpac->setTelefono($telefono);
            $objpac->setDireccion($direccion);
            $objpac->setEstado($estado);
            $objpac->setIdUsuario($id);
            $objpac->setAutogenerado($autogenerado);

            $result = $objpac->create();
            if ($result) {
                Funciones::imprimeJSON(200, "Se Agrego Correctamente", "");
            } else {
                Funciones::imprimeJSON(203, "Error al momento de agregar", "");
            }

        }
    } else {
        $objpac = new paciente();
        $objpac->setDni($dni);
        $objpac->setApellidos($apellidos);
        $objpac->setNombres($nombres);
        $objpac->setSeguro($seguro);
        $objpac->setAutogenerado($autogenerado);
        $objpac->setGenero($genero);
        $objpac->setEmail($email);
        $objpac->setTelefono($telefono);
        $objpac->setDireccion($direccion);
        $objpac->setEstado($estado);
        $objuser->setId($user_id);
        $objuser->setEstado($estado);
        $objuser->setNombre($nombre);
        $objuser->setDni($dni);
        $objpac->setId($paciente_id);
        $objuser->update_estado();
        $result = $objpac->update();
        if ($result) {
            Funciones::imprimeJSON(200, "Se Actualizo Correctamente", "");
        } else {
            Funciones::imprimeJSON(203, "Error al momento de agregar", "");
        }


    }


} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}