<?php

require_once '../negocio/regante.class.php';
require_once '../negocio/declaracion.class.php';
require_once '../negocio/smsGateway.php';
require_once '../util/funciones/Funciones.class.php';

$smsAPI = new SmsGateway("tinny.1609@gmail.com", "kcam1989");

$obj = new Regante();
$objdeclaracion = new Declaracion();
$deviceID = 33322;
//$numero = ["+51966252781", "+51956825692"];
$array_numeros = array();
$array_sms = array();
//$mensaje = "Niggamotherfuckers";

try {

    $registros = $obj->listado_regantes_sms_false();
if(count($registros) > 0){
     for ($i = 0; $i < count($registros); $i++) {
        $dni = $registros[$i]["dni"];
        $celular = $registros[$i]["celular"];
        $nc = $registros[$i]["nc"];

        $reg = $objdeclaracion->declaracion_regante($dni);

        for ($j = 0; $j < count($reg); $j++) {

            $nro_hectarea = $reg[$j]["nro_hectarea"];
            $fecha = $reg[$j]["fecha_atencion"];
            $hora = $reg[$j]["hora_atencion"];
            
            //array_push($array_sms, 'Su hectarea numero '.$nro_hectarea.' se regara el dia '.$fecha.' a las '.$hora.' horas ');
            $mensaje = "El riego de la hectarea ".$nro_hectarea." se realizara el dia ".$fecha." a las ".$hora." horas";
            $resultado = $smsAPI->sendMessageToNumber($celular, $mensaje, $deviceID);   
            
        }
        
        $obj->update_regante_sms($dni);
        
      
    }
    
    echo "true";
}else{
    echo "false";
}
   

   
    //var_dump($resultado);
    //echo json_encode($resultado);
} catch (Exception $exc) {
    Funciones::mensaje($exc->getMessage(), "e");
}
?>


