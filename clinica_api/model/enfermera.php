<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 10/11/2018
 * Time: 8:33 PM
 */
require_once '../datos/conexion.php';

class enfermera extends conexion
{
    private $id;
    private $dni;
    private $cep;
    private $cmp;
    private $apellidos;
    private $nombres;
    private $email;
    private $telefono;
    private $estado;
    private $id_usuario;

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
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getCmp()
    {
        return $this->cmp;
    }

    /**
     * @param mixed $cmp
     */
    public function setCmp($cmp)
    {
        $this->cmp = $cmp;
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



    public function create()
    {
        try {
            $sql = "insert into enfermera (dni, cep, apellidos, nombres, email, telefono, estado, usuario_id)
                    values (:p_dni, :p_cep ,:p_apellidos, :p_nombres, :p_email, :p_telefono, :p_estado, :p_userid); ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_cep", $this->cep);
            $sentencia->bindParam(":p_apellidos", $this->apellidos);
            $sentencia->bindParam(":p_nombres", $this->nombres);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_telefono", $this->telefono);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_userid", $this->id_usuario);
            $sentencia->execute();
            return True;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE enfermera SET dni =:p_dni,cep = :p_cep,
                        apellidos = :p_apellidos, nombres = :p_nombres, email = :p_email, 
                        telefono =  :p_telefono, estado = :p_estado
                        WHERE id = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_cep", $this->cep);
            $sentencia->bindParam(":p_apellidos", $this->apellidos);
            $sentencia->bindParam(":p_nombres", $this->nombres);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_telefono", $this->telefono);
            $sentencia->bindParam(":p_estado", $this->estado);
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
            $sql = "UPDATE enfermera SET dni = :p_dni, estado = :p_estado
                        WHERE usuario_id = :p_id";

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

    public function read()
    {
        try {
            $sql = "select * from enfermera where id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }

    }

    public function lista()
    {
        try {
            $sql = "select * from enfermera";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }

    }




}