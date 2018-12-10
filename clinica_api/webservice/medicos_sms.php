<?php
require_once '../client-php-master/autoload.php';
require_once '../model/medico.php';
require_once '../model/analisisHistory.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MzQzMTIwMCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY0Nzc5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.HEm0dd6IhGN4FqFXa35Rn2RVqyZXxjE3oyzwiVaqEHA';
$config->setApiKey('Authorization', $token);
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

$obj = new medico();
$objah = new analisisHistory();

$resultado = $obj->phones();
$resultado2 = $objah->hemo_baja();

$telefono = $resultado["telefono"];
$medico= $resultado["medico"];
$cant = $resultado2["num"];

$sendMessageRequest1 = new SendMessageRequest([
    'phoneNumber' => $telefono,
    'message' => 'Dr. ' . $medico. ' existe(n) ' . $cant. ' 
    paciente(s) con hemoglobina baja, lo que puede conlleva a algun grado de anemia',
    'deviceId' => 106061
]);
$sendMessages = $messageClient->sendMessages([
    $sendMessageRequest1]);

Funciones::imprimeJSON(200, "",$sendMessages);

//$lista = array();
//for ($i = 0; $i < count($resultado); $i++) {
//    //$telefono = $resultado[$i]["telefono"];
//    //$medico = $resultado[$i]["medico"];
//    $cant = $resultado[$i]["num"];
//
//    $sendMessageRequest1 = new SendMessageRequest([
//    'phoneNumber' => $telefono,
//    'message' => 'Dr. ' . $medico. ' existe(n) ' . $cant. '
//    paciente(s) con hemoglobina baja, lo que puede conlleva a algun grado de anemia',
//    'deviceId' => 106061
//    ]);
//    $sendMessages = $messageClient->sendMessages([
//        $sendMessageRequest1]);
//}

// Sending a SMS Message
//$sendMessageRequest1 = new SendMessageRequest([
//    'phoneNumber' => '943321593',
//    'message' => 'La fifi',
//    'deviceId' => 106060
//]);



//print_r($sendMessages);