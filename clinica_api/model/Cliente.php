<?php

require_once '../Conexion_config/conexion.php';

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 20/09/2018
 * Time: 2:26 PM
 */
class Cliente extends conexion
{
    private $cliente_id;
    private $dni_ruc;
    private $nombre;
    private $razon_social;
    private $direccion;
    private $celular;
    private $email;
    private $fecha_registro;
    private $fecha_validacion;
    private $estado;
    private $valor;
    private $usuario;
    private $tipo;
    private $ubicacion_id;

    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * @param mixed $cliente_id
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    /**
     * @return mixed
     */
    public function getDniRuc()
    {
        return $this->dni_ruc;
    }

    /**
     * @param mixed $dni_ruc
     */
    public function setDniRuc($dni_ruc)
    {
        $this->dni_ruc = $dni_ruc;
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
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
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
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
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
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * @param mixed $fecha_registro
     */
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    /**
     * @return mixed
     */
    public function getFechaValidacion()
    {
        return $this->fecha_validacion;
    }

    /**
     * @param mixed $fecha_validacion
     */
    public function setFechaValidacion($fecha_validacion)
    {
        $this->fecha_validacion = $fecha_validacion;
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo_id
     */
    public function setTipoId($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getUbicacionId()
    {
        return $this->ubicacion_id;
    }

    /**
     * @param mixed $ubicacion_id
     */
    public function setUbicacionId($ubicacion_id)
    {
        $this->ubicacion_id = $ubicacion_id;
    }


    public function create()
    {
        try {
            $sql = "INSERT INTO `cliente`(`dni_ruc`, `nombre`, `razon_social`, `direccion`, `celular`, 
            `email`, `fecha_registro`, `fecha_validacion`, `estado`, `valor`, `usuario`, `tipo`, `ubicacion_id`)
            VALUES (:p_dni_ruc,:p_nombre,:p_razon,:p_direccion,:p_celular,:p_email,:p_fregistro,:p_fvalidacion,
            :p_estado,:p_valor,:p_usuario,:p_tipo,:p_ubicacion)";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni_ruc", $this->dni_ruc);
            $sentencia->bindParam(":p_nombre", $this->nombre);
            $sentencia->bindParam(":p_razon", $this->razon_social);
            $sentencia->bindParam(":p_direccion", $this->direccion);
            $sentencia->bindParam(":p_celular", $this->celular);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_fregistro", $this->fecha_registro);
            $sentencia->bindParam(":p_fvalidacion", $this->fecha_validacion);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_valor", $this->valor);
            $sentencia->bindParam(":p_usuario", $this->usuario);
            $sentencia->bindParam(":p_tipo", $this->tipo);
            $sentencia->bindParam(":p_ubicacion", $this->ubicacion_id);
            $sentencia->execute();
            return True;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update_var_direccion($latitud, $longitud)
    {
        $this->dblink->beginTransaction();
        try {

            $sql = "INSERT INTO `ubicacion`(`latitud`, `longitud`) VALUES (:p_latitud,:p_longitud)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_latitud", $latitud);
            $sentencia->bindParam(":p_longitud", $longitud);
            $sentencia->execute();


            $sql = "SELECT id FROM `ubicacion` order by 1 desc limit 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($sentencia->rowCount()) {
                $ubicacion_id = $resultado["id"];
                $sql = "UPDATE `cliente` SET `dni_ruc`=:p_dni_ruc, `razon_social`=:p_razon,`direccion`=:p_direccion,
                    `ubicacion_id`=:p_ubicacion WHERE `id` = :p_id";

                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_dni_ruc", $this->dni_ruc);
                $sentencia->bindParam(":p_razon", $this->razon_social);
                $sentencia->bindParam(":p_direccion", $this->direccion);
                $sentencia->bindParam(":p_ubicacion", $ubicacion_id);
                $sentencia->bindParam(":p_id", $this->cliente_id);
                $sentencia->execute();
                $this->dblink->commit();
                return true;
            }

            return False;


        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }

    public function update()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE `cliente` SET `dni_ruc`=:p_dni_ruc,`nombre`=:p_nombre,
                    `razon_social`=:p_razon,`direccion`=:p_direccion,`celular`=:p_celular,`email`=:p_email,
                    `fecha_registro`=:p_fregistro,`fecha_validacion`=:p_fvalidacion,`estado`=:p_estado,`valor`=:p_valor,
                    `usuario`=:p_usuario,`tipo`=:p_tipo,`ubicacion_id`=:p_ubicacion WHERE `id` = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni_ruc", $this->dni_ruc);
            $sentencia->bindParam(":p_nombre", $this->nombre);
            $sentencia->bindParam(":p_razon", $this->razon_social);
            $sentencia->bindParam(":p_direccion", $this->direccion);
            $sentencia->bindParam(":p_celular", $this->celular);
            $sentencia->bindParam(":p_email", $this->email);
            $sentencia->bindParam(":p_fregistro", $this->fecha_registro);
            $sentencia->bindParam(":p_fvalidacion", $this->fecha_validacion);
            $sentencia->bindParam(":p_estado", $this->estado);
            $sentencia->bindParam(":p_valor", $this->valor);
            $sentencia->bindParam(":p_usuario", $this->usuario);
            $sentencia->bindParam(":p_tipo", $this->tipo);
            $sentencia->bindParam(":p_ubicacion", $this->ubicacion_id);
            $sentencia->bindParam(":p_id", $this->cliente_id);
            $sentencia->execute();
            $this->dblink->commit();;

            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }

    public function list_cliente()
    {
        $sql = "SELECT * FROM cliente";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function read_cliente($id)
    {
        $sql = "SELECT * FROM cliente WHERE id = " . $id;
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        return $resultado;
    }

    public function limit_credito($id)
    {
        try {
            $sql = "select id from cliente where id = " . $id;
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($sentencia->rowCount()) {
                $cliente_id = $resultado["id"];
            }

            $sql = "select (SUM(total) / COUNT(cliente_id) + 500) as limite_credito from pedido where cliente_id = :p_cliente_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cliente_id", $cliente_id);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function estado_cuenta($param)
    {

        try {
            if ($param == 'pendiente'){
                $sql = "select p.numeracion, pa.pedido_id, count(pa.num_cuota) as numero_cuota,sum(interes) as total_interes,
                sum(pa.importe) as total_importe, sum(pa.saldo) as total_saldo, p.estado, sum(pa.dias) as dias
                from cliente c inner join pedido p on c.id = p.cliente_id left join 
                pago pa on p.id = pa.pedido_id
                where  p.estado = 'Abierto' and p.cliente_id = :p_cliente_id group by pa.pedido_id";

                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cliente_id", $this->cliente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $sql = "select p.numeracion, pa.pedido_id, count(pa.num_cuota) as numero_cuota,sum(interes) as total_interes,
                sum(pa.importe) as total_importe, sum(pa.saldo) as total_saldo, p.estado, sum(pa.dias) as dias
                from cliente c inner join pedido p on c.id = p.cliente_id left join 
                pago pa on p.id = pa.pedido_id
                where p.estado = 'Pagado' and p.cliente_id = :p_cliente_id group by pa.pedido_id";

                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cliente_id", $this->cliente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            }


            return $resultado;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function c1_antiguedad($id){
        try {
            $sql = "select id, nombre, datediff( now(), fecha_registro ) as antiguedad 
                    FROM cliente where id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC  );
            return $resultado;

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function c2_puntualidadpagos($id){
        try {
            $sql = "select c.id, ( case when sum(x.dias) is not null then sum(x.dias) else 0 end )as dias
            from pago x inner join pedido p on x.pedido_id= p.id RIGHT JOIN cliente c on
            c.id = p.cliente_id where p.fecha_pedido between date_sub(now(),interval 1 year) and now()
            and c.id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC  );
            return $resultado;

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function c3_volumen($id){
        try {
            $sql = "select c.id, ( case when sum(p.total)
                    is not null then sum(p.total) else 0 end ) as total_compras
                    from pedido p RIGHT join cliente c on c.id =p.cliente_id
                    where p.fecha_pedido between date_sub(now(),interval 1 year)
                    and now() and c.id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC  );
            return $resultado;

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function c4_frecuencia($id){
        try {
            $sql = "select c.id, count(*) as num_compras from pedido p RIGHT join cliente c on
                    c.id = p.cliente_id where p.fecha_pedido between date_sub(now(),interval 1 year) and now()
                    and c.id = :p_id and p.estado != 'Cancelado' ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC  );
            return $resultado;

        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function c5_tipocliente($id){
        try {
            $sql = "select id, tipo from cliente where id = :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC  );
            return $resultado;

        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function addvalor($id, $valor) {
        $this->dblink->beginTransaction();

        try {
            $sql = "select id from cliente where id= :p_id ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_id", $id);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($sentencia->rowCount()){
                $sql = "update cliente  set valor = :p_valor where id  = :p_id ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_valor", $valor);
                $sentencia->bindParam(":p_id", $id);
                $sentencia->execute();

            }
            else{
                $sql = "insert into cliente (valor) values(:p_valor) where id = :p_id";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_valor", $valor);
                $sentencia->bindParam(":p_id", $id);

                $sentencia->execute();
            }
            $this->dblink->commit();
            return true;

        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }



    }



}