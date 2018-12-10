<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 23/10/2018
 * Time: 11:08 PM
 */
require_once '../datos/conexion.php';

class usuario extends conexion
{
    private $id;
    private $tipo;
    private $nombre;
    private $dni;
    private $clave;
    private $estado;

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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
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

//    public function user_get(){
//        $sql = "select * from usuario where id = :p_id ";
//        $sentencia = $this->dblink->prepare($sql);
//        $sentencia->bindParam(":p_id", $this->id);
//        $sentencia->execute();
//        $resultado = $sentencia->fetch();
//        return $resultado;
//
//}

    public function auth()
    {
        try {
//            $sql = "select u.id, u.nombre_usuario, u.dni, u.clave, u.estado,
//                    u.rol_id , r.nombre from usuario u inner join rol r on u.rol_id = r.id
//                    where u.dni = :p_dni";
            $sql = "select u.id, u.estado,u.nombre_usuario,u.clave,u.dni,u.clave,r.nombre, r.id as rol,
                      (case when  r.id != 4 then 0 else p.id end ) as paciente_id,
                      (case when  r.id != 4 then '0' else p.email end ) as email,
                      (case when  r.id != 4 then '0' else p.telefono end ) as telefono,
                      (case when  r.id != 4 then '0' else p.tipo_seguro end ) as seguro
                      from
                        usuario u inner join rol r on u.tipo_usuario = r.id left join
                        paciente p on p.id_usuario = u.id
                      where u.dni = :p_dni;";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            if ($sentencia->rowCount()) {
                $activo = $resultado["estado"];
                $clave = $resultado["clave"];
                if ($activo == 1) {
                    if (password_verify($this->clave, $clave)) {
                        return $resultado;
                    } else {
                        return 0;
                    }
                } else {
                    return -1;
                }
            }
            return -2;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function create()
    {
        try {
            $clave = password_hash($this->clave, PASSWORD_DEFAULT);

            $sql = "insert into usuario (tipo_usuario, nombre_usuario, dni, clave, estado) 
                    values (:p_tipousuario, :p_nombre, :p_dni, :p_clave, :p_estado) ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_tipousuario", $this->tipo);
            $sentencia->bindParam(":p_nombre", $this->nombre);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_clave", $clave);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->execute();

            $sql = "SELECT id FROM usuario order by 1 desc limit 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($sentencia->rowCount()) {
                $user_id = $resultado["id"];
            }
            return $user_id;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update_estado()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE usuario SET estado = :p_estado, nombre_usuario = :p_name, dni = :p_dni
                    WHERE id = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_name", $this->nombre);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->execute();
            $this->dblink->commit();
            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }
    public function update()
    {
        $this->dblink->beginTransaction();
        try {
            $clave = password_hash($this->clave, PASSWORD_DEFAULT);
            $sql = "UPDATE usuario SET dni = :p_dni, tipo_usuario = :p_rol, clave = :p_clave, estado = :p_estado
                    WHERE id = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $this->dni);
            $sentencia->bindParam(":p_rol", $this->tipo);
            $sentencia->bindParam(":p_clave", $clave);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->execute();
            $this->dblink->commit();
            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }

    public function list_usuarios()
    {
        try {

            $sql = "select u.*, r.nombre as rol from usuario u inner join rol r on u.tipo_usuario = r.id";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $ex) {
            throw $ex;
        }


    }

    public function read($id)
    {
        try {
            $sql = "SELECT u.id, u.nombre_usuario, u.dni, u.estado, r.nombre, u.tipo_usuario
                    FROM usuario u INNER JOIN rol r on u.tipo_usuario = r.id
                    WHERE u.id = " . $id ;
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            return $resultado;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function validar_password(){

        $sql = "select * from usuario 
                    where id = :p_id";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->bindParam(":p_id", $this->id);
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        if ($sentencia->rowCount()) {
            $contrasenia = $resultado["clave"];
            if (password_verify($this->clave, $contrasenia)) {
                return 1;
            }
            else{
                return 0;
            }
        }
        return -1;
    }


}