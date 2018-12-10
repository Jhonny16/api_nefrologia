<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 24/10/2018
 * Time: 11:29 PM
 */
require_once '../datos/conexion.php';
class paciente extends conexion
{

    private $id;
    private $dni;
    private $seguro;
    private $autogenerado;
    private $apellidos;
    private $nombres;
    private $email;
    private $telefono;
    private $genero;
    private $direccion;
    private $estado;
    private $id_usuario;

    /**
     * @return mixed
     */
    public function getAutogenerado()
    {
        return $this->autogenerado;
    }

    /**
     * @param mixed $autogenerado
     */
    public function setAutogenerado($autogenerado)
    {
        $this->autogenerado = $autogenerado;
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
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getSeguro()
    {
        return $this->seguro;
    }

    /**
     * @param mixed $seguro
     */
    public function setSeguro($seguro)
    {
        $this->seguro = $seguro;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }



    public function lista()
    {
        $sql = "SELECT * FROM paciente";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function create()
    {
        try {
            $sql = "insert into paciente (dni_paciente, tipo_seguro, autogenerado,apellidos, nombres, email, genero, telefono,
                    direccion, estado, id_usuario)
                    values (:p_dni, :p_seguro,:p_autogenerado,:p_apellidos, :p_nombres, :p_email ,:p_genero,:p_telefono, :p_direccion,
                    :p_estado, :p_userid); ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_seguro", $this->seguro);
            $sentencia->bindParam(":p_autogenerado", $this->autogenerado);
            $sentencia->bindParam(":p_apellidos", $this->apellidos);
            $sentencia->bindParam(":p_nombres", $this->nombres);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_genero", $this->genero);
            $sentencia->bindParam(":p_telefono", $this->telefono);
            $sentencia->bindParam(":p_direccion", $this->direccion);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_userid", $this->id_usuario);
            $sentencia->execute();
            return True;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function read()
    {
        try {
            $sql = "select * from paciente where id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }

    }

    public function update()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE paciente SET dni_paciente =:p_dni,apellidos = :p_apellidos, nombres = :p_nombres, 
                        tipo_seguro = :p_seguro ,email = :p_email,genero = :p_genero ,telefono =  :p_telefono, 
                        direccion = :p_direccion, estado = :p_estado, autogenerado = :p_autogenerado
                        WHERE id = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_apellidos", $this->apellidos);
            $sentencia->bindParam(":p_nombres", $this->nombres);
            $sentencia->bindParam(":p_seguro", $this->seguro);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_genero", $this->genero);
            $sentencia->bindParam(":p_telefono", $this->telefono);
            $sentencia->bindParam(":p_direccion", $this->direccion);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_autogenerado", $this->autogenerado);
            $sentencia->execute();
            $this->dblink->commit();
            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }

    public function update_user($dni,$state,$id)
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE paciente SET dni_paciente =:p_dni, estado = :p_estado
                        WHERE id_usuario = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->bindParam(":p_dni", $dni);
            $sentencia->bindParam(":p_estado", $state);
            $sentencia->execute();
            $this->dblink->commit();
            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }

}