<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 7:49 PM
 */
require_once '../datos/conexion.php';
class regla extends conexion
{
    private $codigo;
    private $sexo;
    private $diagnostico;
    private $valor_analisis;
    private $id_regla;
    private $id_analisis;
    private $valor_sintoma;
    private $id_sintoma;
    private $analisis;
    private $sintomas;
    private $anemia;
    private $tratamiento;

    /**
     * @return mixed
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * @param mixed $tratamiento
     */
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;
    }


    /**
     * @return mixed
     */
    public function getAnemia()
    {
        return $this->anemia;
    }

    /**
     * @param mixed $anemia
     */
    public function setAnemia($anemia)
    {
        $this->anemia = $anemia;
    }


    /**
     * @return mixed
     */
    public function getTipoHemoglobina()
    {
        return $this->tipo_hemoglobina;
    }

    /**
     * @param mixed $tipo_hemoglobina
     */
    public function setTipoHemoglobina($tipo_hemoglobina)
    {
        $this->tipo_hemoglobina = $tipo_hemoglobina;
    }




    /**
     * @return mixed
     */
    public function getAnalisis()
    {
        return $this->analisis;
    }

    /**
     * @param mixed $analisis
     */
    public function setAnalisis($analisis)
    {
        $this->analisis = $analisis;
    }

    /**
     * @return mixed
     */
    public function getSintomas()
    {
        return $this->sintomas;
    }

    /**
     * @param mixed $sintomas
     */
    public function setSintomas($sintomas)
    {
        $this->sintomas = $sintomas;
    }




    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * @param mixed $diagnostico
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    /**
     * @return mixed
     */
    public function getValorAnalisis()
    {
        return $this->valor_analisis;
    }

    /**
     * @param mixed $valor_analisis
     */
    public function setValorAnalisis($valor_analisis)
    {
        $this->valor_analisis = $valor_analisis;
    }

    /**
     * @return mixed
     */
    public function getIdRegla()
    {
        return $this->id_regla;
    }

    /**
     * @param mixed $id_regla
     */
    public function setIdRegla($id_regla)
    {
        $this->id_regla = $id_regla;
    }

    /**
     * @return mixed
     */
    public function getIdAnalisis()
    {
        return $this->id_analisis;
    }

    /**
     * @param mixed $id_analisis
     */
    public function setIdAnalisis($id_analisis)
    {
        $this->id_analisis = $id_analisis;
    }

    /**
     * @return mixed
     */
    public function getValorSintoma()
    {
        return $this->valor_sintoma;
    }

    /**
     * @param mixed $valor_sintoma
     */
    public function setValorSintoma($valor_sintoma)
    {
        $this->valor_sintoma = $valor_sintoma;
    }

    /**
     * @return mixed
     */
    public function getIdSintoma()
    {
        return $this->id_sintoma;
    }

    /**
     * @param mixed $id_sintoma
     */
    public function setIdSintoma($id_sintoma)
    {
        $this->id_sintoma = $id_sintoma;
    }

    public function create(){
        $this->dblink->beginTransaction();
        try {

            $sql = "select secuencia from correlativo where tabla = 'regla' ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            $secuencia = $resultado["secuencia"];
            $secuencia = $secuencia + 1;
            if (strlen($secuencia) == 1) {
                $pad = 5;
            } else {
                if (strlen($secuencia) == 2) {
                    $pad = 4;
                } else {
                    if (strlen($secuencia) == 3) {
                        $pad = 3;
                    } else {
                        if (strlen($secuencia) == 4) {
                            $pad = 2;
                        } else {
                            if (strlen($secuencia) == 5) {
                                $pad = 1;
                            }
                        }
                    }
                }
            }
            $correlativo = str_pad($secuencia, $pad, "0", STR_PAD_LEFT);
            $numeracion = "REG-" . $correlativo;
            $this->setCodigo($numeracion);

            $sql = "INSERT INTO regla (codigo,
                              sexo,
                              diagnostico,tratamiento) VALUES (:p_codigo,:p_sexo,:p_diagnostico, :p_tratamiento)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codigo", $this->codigo);
            $sentencia->bindParam(":p_sexo", $this->sexo);
            $sentencia->bindParam(":p_diagnostico", $this->diagnostico);
            $sentencia->bindParam(":p_tratamiento", $this->tratamiento);
            $sentencia->execute();

            $sql = "SELECT id FROM regla order by 1 desc limit 1";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($sentencia->rowCount()) {
                $id_regla = $resultado["id"];
            }

            $analisis = json_decode($this->analisis);

            foreach ($analisis as $key => $value) {
                $sql = "insert into 
                        regla_analisis (valor,id_regla,id_analisis)
                        values(
                        :p_valor,:p_regla,:p_analisis)";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_valor", $value->valor);
                $sentencia->bindParam(":p_regla", $id_regla);
                $sentencia->bindParam(":p_analisis", $value->id);
                $sentencia->execute();
            }

            $sintomas = json_decode($this->sintomas);

            foreach ($sintomas as $key => $value) {
                $sql = "insert into 
                        regla_sintoma (valor,id_regla,id_sintoma)
                        values(
                        :p_valor,:p_regla,:p_sintoma)";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_valor", $value->valor);
                $sentencia->bindParam(":p_regla", $id_regla);
                $sentencia->bindParam(":p_sintoma", $value->id);
                $sentencia->execute();
            }

            $sql = "update correlativo set secuencia = :p_secuencia where tabla = 'regla' ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_secuencia", $secuencia);
            $sentencia->execute();
            $this->dblink->commit();
            return True;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function lista_analsis_sintomas(){
        try {

            $sql = "  select re.codigo ,re.id, re.diagnostico, re.sexo,re.tratamiento,
                      (select valor from  regla_analisis where id_analisis = 1 AND id_regla = re.id) as a1,
                      (select valor from  regla_analisis where id_analisis = 2 AND id_regla = re.id) as a2,
                      (select valor from  regla_analisis where id_analisis = 4 AND id_regla = re.id) as a4,
                      (select valor from  regla_analisis where id_analisis = 5 AND id_regla = re.id) as a5,
                      (select valor from  regla_analisis where id_analisis = 6 AND id_regla = re.id) as a6,
                      (select valor from  regla_analisis where id_analisis = 7 AND id_regla = re.id) as a7,
                      (select valor from  regla_analisis where id_analisis = 8 AND id_regla = re.id) as a8,
                      (select valor from  regla_analisis where id_analisis = 9 AND id_regla = re.id) as a9,
                      (select valor from  regla_analisis where id_analisis = 10 AND id_regla = re.id) as a10,
                      (select valor from  regla_analisis where id_analisis = 11 AND id_regla = re.id) as a11,
                      (select valor from  regla_analisis where id_analisis = 12 AND id_regla = re.id) as a12,
                      (select valor from  regla_analisis where id_analisis = 13 AND id_regla = re.id) as a13,
                      (select valor from  regla_analisis where id_analisis = 14 AND id_regla = re.id) as a14,
                      (select valor from  regla_sintoma where id_sintoma = 1 AND id_regla = re.id) as s1,
                      (select valor from  regla_sintoma where id_sintoma = 2 AND id_regla = re.id) as s2,
                      (select valor from  regla_sintoma where id_sintoma = 3 AND id_regla = re.id) as s3,
                      (select valor from  regla_sintoma where id_sintoma = 4 AND id_regla = re.id) as s4,
                      (select valor from  regla_sintoma where id_sintoma = 5 AND id_regla = re.id) as s5,
                      (select valor from  regla_sintoma where id_sintoma = 6 AND id_regla = re.id) as s6,
                      (select valor from  regla_sintoma where id_sintoma = 7 AND id_regla = re.id) as s7,
                      (select valor from  regla_sintoma where id_sintoma = 8 AND id_regla = re.id) as s8,
                      (select valor from  regla_sintoma where id_sintoma = 9 AND id_regla = re.id) as s9
                      from regla re ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;


        } catch (Exception $ex) {
            throw $ex;

        }
    }

    public function lista(){

        try{
            $sql = "select * from regla ORDER BY 1 ASC ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}