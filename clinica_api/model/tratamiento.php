<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 30/10/2018
 * Time: 1:28 PM
 */
require_once '../datos/conexion.php';
class tratamiento extends conexion
{
    private $id;
    private $descripcion;
    private $fecha;
    private $regla_id;
    private $paciente_id;
    private $usuario_id;

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->ususario_id;
    }

    /**
     * @param mixed $medico_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->ususario_id = $usuario_id;
    }



    /**
     * @return mixed
     */
    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    /**
     * @param mixed $paciente_id
     */
    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
    }




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getReglaId()
    {
        return $this->regla_id;
    }

    /**
     * @param mixed $regla_id
     */
    public function setReglaId($regla_id)
    {
        $this->regla_id = $regla_id;
    }

    public function create(){
        try {

            $sql = "INSERT INTO tratamiento (descripcion,fecha, regla_id, paciente_id, usuario_id)
                    VALUES (:p_descripcion,:p_fecha,:p_reglaid,:p_paciente_id,:p_usuario_id)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_descripcion", $this->descripcion);
            $sentencia->bindParam(":p_fecha", $this->fecha);
            $sentencia->bindParam(":p_reglaid", $this->regla_id);
            $sentencia->bindParam(":p_paciente_id", $this->paciente_id);
            $sentencia->bindParam(":p_usuario_id", $this->usuario_id);
            $sentencia->execute();

            return True;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function lista($fecha_inicio, $fecha_fin, $param){
        try {
            $fechainicio = date_create($fecha_inicio);
            $date1 = date_format($fechainicio, 'Y-m-d');
            $fechafin = date_create($fecha_fin);
            $date2 = date_format($fechafin, 'Y-m-d');

            if($param=='1'){
                $sql = "select t.id, t.fecha, t.descripcion, p.apellidos||' '||p.nombres as paciente,
                      re.codigo as regla, re.diagnostico
                      from tratamiento t inner join paciente p on t.paciente_id = p.id inner JOIN regla re
                          on re.id = t.regla_id
                    where t.fecha = current_date ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;

            }else{

                $sql = "select t.id, t.fecha, t.descripcion, p.apellidos||' '||p.nombres as paciente,
                      re.codigo as regla, re.diagnostico
                      from tratamiento t inner join paciente p on t.paciente_id = p.id inner JOIN regla re
                          on re.id = t.regla_id
                    where t.fecha BETWEEN :p_fechainicio and :p_fechafin ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_fechainicio", $date1);
                $sentencia->bindParam(":p_fechafin", $date2);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;

            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function tratamiento_paciente($id, $mes,$anio){
        try {

            $sql = "select p.id, p.apellidos ||' ' || p.nombres as paciente, t.fecha, r.diagnostico, t.descripcion as trato
                    from  paciente p inner JOIN tratamiento t on p.id = t.paciente_id inner join regla r on r.id = t.regla_id
                    where extract(MONTH from fecha) = :p_mes and extract(YEAR from fecha) = :p_anio and p.id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->bindParam(":p_mes", $mes);
            $sentencia->bindParam(":p_anio", $anio);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

}