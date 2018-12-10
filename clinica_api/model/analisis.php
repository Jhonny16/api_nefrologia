<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 30/10/2018
 * Time: 12:21 AM
 */
require_once '../datos/conexion.php';
class analisis extends conexion
{

    public function lista()
    {
        $sql = "SELECT * FROM analisis order by id asc";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function lista_por_regla($id)
    {
        $sql = "SELECT a.nombre, (case when r.valor = 'N' then 'Ninguno' else r.valor end) , reg.codigo
FROM analisis a inner join regla_analisis r on a.id = r.id_analisis inner join regla reg on r.id_regla = reg.id 
where r.id_regla = :p_id";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->bindParam(":p_id", $id);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

}