<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 05/12/2018
 * Time: 7:33 PM
 */
require_once '../datos/conexion.php';
class sintomas extends conexion
{
    public function lista_por_regla($id)
    {
        $sql = "SELECT  reg.codigo, (case when rs.valor = TRUE then 'Si' else 'No' end ) as valor,s.nombre
                      FROM sintoma s inner join regla_sintoma rs on s.id = rs.id_sintoma inner join regla reg on rs.id_regla = reg.id
                      where rs.id_regla = :p_id";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->bindParam(":p_id", $id);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}