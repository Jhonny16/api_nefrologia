<?php

/**
 * Created by PhpStorm.
 * User: tito_
 * Date: 29/10/2018
 * Time: 10:47 AM
 */
require_once '../datos/conexion.php';
class analisisHistory extends conexion
{
    private $id;
    private $code;
    private $fecha;
    private $hto;
    private $hb;
    private $ureapre;
    private $ureapost;
    private $tgo;
    private $tgp;
    private $creatinapre;
    private $calcio;
    private $fosforo;
    private $sodio;
    private $potasio;
    private $cloro;
    private $proteinas;
    private $albumina;
    private $globulina;
    private $hierroserico;
    private $saturacion;
    private $ferritina;
    private $fosfatasa;
    private $hepatitisb;
    private $hiv;
    private $coretotal;
    private $hbsag;
    private $vdrl;
    private $paratohormona;
    private $antihbc;
    private $antihbsag;
    private $achvc;
    private $seguro;
    private $user_id;




    private $transferrina;
    private $id_paciente;
    private $mes;
    private $anio;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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
    public function getParatohormona()
    {
        return $this->paratohormona;
    }

    /**
     * @param mixed $paratohormona
     */
    public function setParatohormona($paratohormona)
    {
        $this->paratohormona = $paratohormona;
    }

    /**
     * @return mixed
     */
    public function getAntihbc()
    {
        return $this->antihbc;
    }

    /**
     * @param mixed $antihbc
     */
    public function setAntihbc($antihbc)
    {
        $this->antihbc = $antihbc;
    }

    /**
     * @return mixed
     */
    public function getAntihbsag()
    {
        return $this->antihbsag;
    }

    /**
     * @param mixed $antihbsag
     */
    public function setAntihbsag($antihbsag)
    {
        $this->antihbsag = $antihbsag;
    }

    /**
     * @return mixed
     */
    public function getAchvc()
    {
        return $this->achvc;
    }

    /**
     * @param mixed $achvc
     */
    public function setAchvc($achvc)
    {
        $this->achvc = $achvc;
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
    public function getTgp()
    {
        return $this->tgp;
    }

    /**
     * @param mixed $tgp
     */
    public function setTgp($tgp)
    {
        $this->tgp = $tgp;
    }


    /**
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $mes
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    /**
     * @return mixed
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param mixed $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getHto()
    {
        return $this->hto;
    }

    /**
     * @param mixed $hto
     */
    public function setHto($hto)
    {
        $this->hto = $hto;
    }

    /**
     * @return mixed
     */
    public function getHb()
    {
        return $this->hb;
    }

    /**
     * @param mixed $hb
     */
    public function setHb($hb)
    {
        $this->hb = $hb;
    }

    /**
     * @return mixed
     */
    public function getUreapre()
    {
        return $this->ureapre;
    }

    /**
     * @param mixed $ureapre
     */
    public function setUreapre($ureapre)
    {
        $this->ureapre = $ureapre;
    }

    /**
     * @return mixed
     */
    public function getUreapost()
    {
        return $this->ureapost;
    }

    /**
     * @param mixed $ureapost
     */
    public function setUreapost($ureapost)
    {
        $this->ureapost = $ureapost;
    }

    /**
     * @return mixed
     */
    public function getTgo()
    {
        return $this->tgo;
    }

    /**
     * @param mixed $tgo
     */
    public function setTgo($tgo)
    {
        $this->tgo = $tgo;
    }

    /**
     * @return mixed
     */
    public function getCreatinapre()
    {
        return $this->creatinapre;
    }

    /**
     * @param mixed $creatinapre
     */
    public function setCreatinapre($creatinapre)
    {
        $this->creatinapre = $creatinapre;
    }

    /**
     * @return mixed
     */
    public function getCalcio()
    {
        return $this->calcio;
    }

    /**
     * @param mixed $calcio
     */
    public function setCalcio($calcio)
    {
        $this->calcio = $calcio;
    }

    /**
     * @return mixed
     */
    public function getFosforo()
    {
        return $this->fosforo;
    }

    /**
     * @param mixed $fosforo
     */
    public function setFosforo($fosforo)
    {
        $this->fosforo = $fosforo;
    }

    /**
     * @return mixed
     */
    public function getSodio()
    {
        return $this->sodio;
    }

    /**
     * @param mixed $sodio
     */
    public function setSodio($sodio)
    {
        $this->sodio = $sodio;
    }

    /**
     * @return mixed
     */
    public function getPotasio()
    {
        return $this->potasio;
    }

    /**
     * @param mixed $potasio
     */
    public function setPotasio($potasio)
    {
        $this->potasio = $potasio;
    }

    /**
     * @return mixed
     */
    public function getCloro()
    {
        return $this->cloro;
    }

    /**
     * @param mixed $cloro
     */
    public function setCloro($cloro)
    {
        $this->cloro = $cloro;
    }

    /**
     * @return mixed
     */
    public function getProteinas()
    {
        return $this->proteinas;
    }

    /**
     * @param mixed $proteinas
     */
    public function setProteinas($proteinas)
    {
        $this->proteinas = $proteinas;
    }

    /**
     * @return mixed
     */
    public function getAlbumina()
    {
        return $this->albumina;
    }

    /**
     * @param mixed $albumina
     */
    public function setAlbumina($albumina)
    {
        $this->albumina = $albumina;
    }

    /**
     * @return mixed
     */
    public function getGlobulina()
    {
        return $this->globulina;
    }

    /**
     * @param mixed $globulina
     */
    public function setGlobulina($globulina)
    {
        $this->globulina = $globulina;
    }

    /**
     * @return mixed
     */
    public function getHierroserico()
    {
        return $this->hierroserico;
    }

    /**
     * @param mixed $hierroserico
     */
    public function setHierroserico($hierroserico)
    {
        $this->hierroserico = $hierroserico;
    }

    /**
     * @return mixed
     */
    public function getSaturacion()
    {
        return $this->saturacion;
    }

    /**
     * @param mixed $saturacion
     */
    public function setSaturacion($saturacion)
    {
        $this->saturacion = $saturacion;
    }

    /**
     * @return mixed
     */
    public function getFerritina()
    {
        return $this->ferritina;
    }

    /**
     * @param mixed $ferritina
     */
    public function setFerritina($ferritina)
    {
        $this->ferritina = $ferritina;
    }

    /**
     * @return mixed
     */
    public function getFosfatasa()
    {
        return $this->fosfatasa;
    }

    /**
     * @param mixed $fosfatasa
     */
    public function setFosfatasa($fosfatasa)
    {
        $this->fosfatasa = $fosfatasa;
    }

    /**
     * @return mixed
     */
    public function getHepatitisb()
    {
        return $this->hepatitisb;
    }

    /**
     * @param mixed $hepatitisb
     */
    public function setHepatitisb($hepatitisb)
    {
        $this->hepatitisb = $hepatitisb;
    }

    /**
     * @return mixed
     */
    public function getHepatitisc()
    {
        return $this->hepatitisc;
    }

    /**
     * @param mixed $hepatitisc
     */
    public function setHepatitisc($hepatitisc)
    {
        $this->hepatitisc = $hepatitisc;
    }

    /**
     * @return mixed
     */
    public function getHiv()
    {
        return $this->hiv;
    }

    /**
     * @param mixed $hiv
     */
    public function setHiv($hiv)
    {
        $this->hiv = $hiv;
    }

    /**
     * @return mixed
     */
    public function getCoretotal()
    {
        return $this->coretotal;
    }

    /**
     * @param mixed $coretotal
     */
    public function setCoretotal($coretotal)
    {
        $this->coretotal = $coretotal;
    }

    /**
     * @return mixed
     */
    public function getHbsag()
    {
        return $this->hbsag;
    }

    /**
     * @param mixed $hbsag
     */
    public function setHbsag($hbsag)
    {
        $this->hbsag = $hbsag;
    }

    /**
     * @return mixed
     */
    public function getVdrl()
    {
        return $this->vdrl;
    }

    /**
     * @param mixed $vdrl
     */
    public function setVdrl($vdrl)
    {
        $this->vdrl = $vdrl;
    }

    /**
     * @return mixed
     */
    public function getTransferrina()
    {
        return $this->transferrina;
    }

    /**
     * @param mixed $transferrina
     */
    public function setTransferrina($transferrina)
    {
        $this->transferrina = $transferrina;
    }

    /**
     * @return mixed
     */
    public function getIdPaciente()
    {
        return $this->id_paciente;
    }

    /**
     * @param mixed $id_paciente
     */
    public function setIdPaciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
    }

    public function create(){

        $this->dblink->beginTransaction();
        try {

            $sql = "select secuencia from correlativo where tabla = 'analisis' ";
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
            $numeracion = "AN-" . $correlativo;
            $this->setCode($numeracion);

            $sql = "INSERT INTO analisis_history (code,
                              fecha,
                              hto ,
                              hb ,
                              ureapre ,
                              ureapost ,
                              tgo ,
                              tgp ,
                              creatinapre ,
                              calcio ,
                              fosforo ,
                              sodio ,
                              potasio ,
                              cloro ,
                              proteinas ,
                              albumina ,
                              globulina ,
                              hierroserico ,
                              saturacion ,
                              ferritina ,
                              fosfatasa ,
                              hepatitisb ,
                              hiv ,
                              coretotal,
                              hbsag ,
                              vdrl ,
                              id_paciente,
                              mes ,
                              anio,
                              paratohormona,
                              achvc,
                              seguro,
                              user_id) VALUES (:p_code,:p_fecha,:p_hto,:p_hb,:p_ureapre,:p_ureapost,:p_tgo,:p_tgp,
              :p_creatinapre,:p_calcio,:p_fosforo,:p_sodio,:p_potasio,:p_cloro,:p_proteinas,:p_albumina,:p_globulina,:p_hierroserico
             ,:p_saturacion,:p_ferritina,:p_fosfatasa,:p_hepatitisb,:p_hiv,:p_coretotal,:p_hbsag
             ,:p_vdrl,:p_id_paciente,:p_mes,:p_anio,:p_paratohormona,:p_achvc,:p_seguro,:p_user_id)";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_code", $this->code);
            $sentencia->bindParam(":p_fecha", $this->fecha);
            $sentencia->bindParam(":p_hto", $this->hto);
            $sentencia->bindParam(":p_hb", $this->hb);
            $sentencia->bindParam(":p_ureapre", $this->ureapre);
            $sentencia->bindParam(":p_ureapost", $this->ureapost);
            $sentencia->bindParam(":p_tgo", $this->tgo);
            $sentencia->bindParam(":p_tgp", $this->tgp);
            $sentencia->bindParam(":p_creatinapre", $this->creatinapre);
            $sentencia->bindParam(":p_calcio", $this->calcio);
            $sentencia->bindParam(":p_fosforo", $this->fosforo);
            $sentencia->bindParam(":p_sodio", $this->sodio);
            $sentencia->bindParam(":p_potasio", $this->potasio);
            $sentencia->bindParam(":p_cloro", $this->cloro);
            $sentencia->bindParam(":p_proteinas", $this->proteinas);
            $sentencia->bindParam(":p_albumina", $this->albumina);
            $sentencia->bindParam(":p_globulina", $this->globulina);
            $sentencia->bindParam(":p_hierroserico", $this->hierroserico);
            $sentencia->bindParam(":p_saturacion", $this->saturacion);
            $sentencia->bindParam(":p_ferritina", $this->ferritina);
            $sentencia->bindParam(":p_fosfatasa", $this->fosfatasa);
            $sentencia->bindParam(":p_hepatitisb", $this->hepatitisb);
            $sentencia->bindParam(":p_hiv", $this->hiv);
            $sentencia->bindParam(":p_coretotal", $this->coretotal);
            $sentencia->bindParam(":p_hbsag", $this->hbsag);
            $sentencia->bindParam(":p_vdrl", $this->vdrl);
//            $sentencia->bindParam(":p_transferrina", $this->transferrina);
            $sentencia->bindParam(":p_id_paciente", $this->id_paciente);
            $sentencia->bindParam(":p_mes", $this->mes);
            $sentencia->bindParam(":p_anio", $this->anio);
            $sentencia->bindParam(":p_paratohormona", $this->paratohormona);
            $sentencia->bindParam(":p_achvc", $this->achvc);
            $sentencia->bindParam(":p_seguro", $this->seguro);
            $sentencia->bindParam(":p_user_id", $this->user_id);
            $sentencia->execute();

            $sql = "update correlativo set secuencia = :p_secuencia where tabla = 'analisis' ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_secuencia", $secuencia);
            $sentencia->execute();
            $this->dblink->commit();
            return True;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "UPDATE analisis_history SET 
                            fecha = :p_fecha,
                              hto = :p_hto,
                              hb = :p_hb,
                              ureapre = :p_ureapre,
                              ureapost =  :p_ureapost,
                              tgo = :p_tgo,
                              tgp = :p_tgp,
                              creatinapre = :p_creatinapre,
                              calcio = :p_calcio,
                              fosforo = :p_fosforo,
                              sodio = :p_sodio,
                              potasio = :p_potasio,
                              cloro = :p_cloro,
                              proteinas = :p_proteinas,
                              albumina = :p_albumina,
                              globulina = :p_globulina,
                              hierroserico = :p_hierroserico,
                              saturacion = :p_saturacion,
                              ferritina = :p_ferritina,
                              fosfatasa = :p_fosfatasa,
                              hepatitisb = :p_hepatitisb,
                              hiv = :p_hiv,
                              coretotal = :p_coretotal,
                              hbsag = :p_hbsag,
                              vdrl = :p_vdrl,
                              mes = :p_mes,
                              anio = :p_anio,
                              paratohormona = :p_paratohormona,
                              achvc = :p_achvc,
                              seguro = :p_seguro,
                              user_id = :p_user_id 
                              WHERE id = :p_id";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_fecha", $this->fecha);
            $sentencia->bindParam(":p_hto", $this->hto);
            $sentencia->bindParam(":p_hb", $this->hb);
            $sentencia->bindParam(":p_ureapre", $this->ureapre);
            $sentencia->bindParam(":p_ureapost", $this->ureapost);
            $sentencia->bindParam(":p_tgo", $this->tgo);
            $sentencia->bindParam(":p_tgp", $this->tgp);
            $sentencia->bindParam(":p_creatinapre", $this->creatinapre);
            $sentencia->bindParam(":p_calcio", $this->calcio);
            $sentencia->bindParam(":p_fosforo", $this->fosforo);
            $sentencia->bindParam(":p_sodio", $this->sodio);
            $sentencia->bindParam(":p_potasio", $this->potasio);
            $sentencia->bindParam(":p_cloro", $this->cloro);
            $sentencia->bindParam(":p_proteinas", $this->proteinas);
            $sentencia->bindParam(":p_albumina", $this->albumina);
            $sentencia->bindParam(":p_globulina", $this->globulina);
            $sentencia->bindParam(":p_hierroserico", $this->hierroserico);
            $sentencia->bindParam(":p_saturacion", $this->saturacion);
            $sentencia->bindParam(":p_ferritina", $this->ferritina);
            $sentencia->bindParam(":p_fosfatasa", $this->fosfatasa);
            $sentencia->bindParam(":p_hepatitisb", $this->hepatitisb);
            $sentencia->bindParam(":p_hiv", $this->hiv);
            $sentencia->bindParam(":p_coretotal", $this->coretotal);
            $sentencia->bindParam(":p_hbsag", $this->hbsag);
            $sentencia->bindParam(":p_vdrl", $this->vdrl);
//            $sentencia->bindParam(":p_transferrina", $this->transferrina);
            $sentencia->bindParam(":p_mes", $this->mes);
            $sentencia->bindParam(":p_anio", $this->anio);
            $sentencia->bindParam(":p_paratohormona", $this->paratohormona);
            $sentencia->bindParam(":p_achvc", $this->achvc);
            $sentencia->bindParam(":p_seguro", $this->seguro);
            $sentencia->bindParam(":p_user_id", $this->user_id);
            $sentencia->bindParam(":p_id", $this->id);
            $sentencia->execute();
            $this->dblink->commit();;

            return true;

        } catch (Exception $ex) {
            $this->dblink->rollBack();
            throw $ex;
        }
    }
    //Se cambiara el resultado de la consulta, probablemente se necesiten todos lo valores como retorno.
    public function analisisHistoria_paciente(){

        try{
            $sql = "select a.id,a.code,a.fecha, a.hierroserico, a.ferritina,  a.saturacion, a.hb, p.genero
                    from analisis_history as a inner join paciente as p on a.id_paciente = p.id
                    WHERE a.id_paciente = :p_pacienteid and a.mes = :p_mes and a.anio = :p_anio ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_pacienteid", $this->id_paciente);
            $sentencia->bindParam(":p_mes", $this->mes);
            $sentencia->bindParam(":p_anio", $this->anio);
            $sentencia->execute();
            $result = $sentencia->fetch();
            return $result;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function analisisHistory_paciente(){

        try{
            $sql = "select ah.*, p.apellidos ||' ' || p.nombres as paciente
                    from analisis_history as ah inner join paciente as p on ah.id_paciente = p.id
                    WHERE ah.mes = :p_mes and ah.anio = :p_anio and ah.id_paciente = :p_pacienteid ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_pacienteid", $this->id_paciente);
            $sentencia->bindParam(":p_mes", $this->mes);
            $sentencia->bindParam(":p_anio", $this->anio);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;


        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function lista($mes1, $mes2, $anio1, $anio2,$param, $bajo){

        try{
            if($param=='1'){
                $sql = "select ah.*, p.apellidos ||' ' || p.nombres as paciente
                        from analisis_history as ah inner join paciente as p on ah.id_paciente = p.id
                        where (ah.mes BETWEEN :p_mes1 and :p_mes2) and (ah.anio BETWEEN :p_anio1 and :p_anio2) and 
                        (case when :p_bajo = 1 then ah.hb <= 7 else true end);
";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_mes1", $mes1);
                $sentencia->bindParam(":p_mes2", $mes2);
                $sentencia->bindParam(":p_anio1",$anio1);
                $sentencia->bindParam(":p_anio2",$anio2);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                $sql = "select ah.*, p.apellidos ||' ' || p.nombres as paciente
                        from analisis_history as ah inner join paciente as p on ah.id_paciente = p.id
                         where  (case when :p_bajo = 1 then ah.hb <= 7 else true end)";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function lista_vista($mes1, $mes2, $anio1, $anio2,$param, $bajo, $paciente_id){

        try{
            if($param=='1'){
                $sql = "select ah.*, p.apellidos ||' ' || p.nombres as paciente
                        from analisis_history as ah inner join paciente as p on ah.id_paciente = p.id
                        where (ah.mes BETWEEN :p_mes1 and :p_mes2) and (ah.anio BETWEEN :p_anio1 and :p_anio2) and 
                        (case when :p_bajo = 1 then ah.hb <= 7 else true end) and 
                         (case when :p_pacienteid = 0 then True else ah.id_paciente = :p_pacienteid end )";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_mes1", $mes1);
                $sentencia->bindParam(":p_mes2", $mes2);
                $sentencia->bindParam(":p_anio1",$anio1);
                $sentencia->bindParam(":p_anio2",$anio2);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->bindParam(":p_pacienteid",$paciente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                $sql = "select ah.*, p.apellidos ||' ' || p.nombres as paciente
                        from analisis_history as ah inner join paciente as p on ah.id_paciente = p.id
                         where  (case when :p_bajo = 1 then ah.hb <= 7 else true end) and 
                         (case when :p_pacienteid = 0 then True else ah.id_paciente = :p_pacienteid end )";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->bindParam(":p_pacienteid",$paciente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function hemoglobina($anio1, $anio2,$param, $bajo, $paciente_id){

        try{
            if($param=='1'){
                $sql = "select
                          ah.anio :: CHARACTER VARYING,
                          (select hb from  analisis_history where mes = 1 and id_paciente = :p_pacienteid )::NUMERIC as enero,
                          (select hb from  analisis_history where mes = 2 and id_paciente = :p_pacienteid)::NUMERIC as febrero,
                          (select hb from  analisis_history where mes = 3 and id_paciente = :p_pacienteid)::NUMERIC as marzo,
                          (select hb from  analisis_history where mes = 4 and id_paciente = :p_pacienteid)::NUMERIC as abril,
                          (select hb from  analisis_history where mes = 5 and id_paciente = :p_pacienteid )::NUMERIC as mayo,
                          (select hb from  analisis_history where mes = 6 and id_paciente = :p_pacienteid )::NUMERIC as junio,
                          (select hb from  analisis_history where mes = 7 and id_paciente = :p_pacienteid )::NUMERIC as julio,
                          (select hb from  analisis_history where mes = 8 and id_paciente = :p_pacienteid )::NUMERIC as agosto,
                          (select hb from  analisis_history where mes = 9 and id_paciente = :p_pacienteid)::NUMERIC as setiembre,
                          (select hb from  analisis_history where mes = 10 and id_paciente = :p_pacienteid)::NUMERIC as octubre,
                          (select hb from  analisis_history where mes = 11 and id_paciente = :p_pacienteid)::NUMERIC as noviembre,
                          (select hb from  analisis_history where mes = 12 and id_paciente = :p_pacienteid)::NUMERIC as diciembre
                        from analisis_history as ah left join paciente as p on ah.id_paciente = p.id
                        where p.id = :p_pacienteid and (ah.anio BETWEEN :p_anio1 and :p_anio2) AND
                              (case when :p_bajo = 1 then ah.hb <= 7 else true end)
                        group by ah.anio;
                        ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_anio1",$anio1);
                $sentencia->bindParam(":p_anio2",$anio2);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->bindParam(":p_pacienteid",$paciente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                $sql = "select
                          ah.anio :: CHARACTER VARYING,
                          (select hb from  analisis_history where mes = 1 and id_paciente = :p_pacienteid )::NUMERIC as enero,
                          (select hb from  analisis_history where mes = 2 and id_paciente = :p_pacienteid)::NUMERIC as febrero,
                          (select hb from  analisis_history where mes = 3 and id_paciente = :p_pacienteid)::NUMERIC as marzo,
                          (select hb from  analisis_history where mes = 4 and id_paciente = :p_pacienteid)::NUMERIC as abril,
                          (select hb from  analisis_history where mes = 5 and id_paciente = :p_pacienteid )::NUMERIC as mayo,
                          (select hb from  analisis_history where mes = 6 and id_paciente = :p_pacienteid )::NUMERIC as junio,
                          (select hb from  analisis_history where mes = 7 and id_paciente = :p_pacienteid )::NUMERIC as julio,
                          (select hb from  analisis_history where mes = 8 and id_paciente = :p_pacienteid )::NUMERIC as agosto,
                          (select hb from  analisis_history where mes = 9 and id_paciente = :p_pacienteid)::NUMERIC as setiembre,
                          (select hb from  analisis_history where mes = 10 and id_paciente = :p_pacienteid)::NUMERIC as octubre,
                          (select hb from  analisis_history where mes = 11 and id_paciente = :p_pacienteid)::NUMERIC as noviembre,
                          (select hb from  analisis_history where mes = 12 and id_paciente = :p_pacienteid)::NUMERIC as diciembre
                        from analisis_history as ah left join paciente as p on ah.id_paciente = p.id
                        where p.id = :p_pacienteid  AND
                              (case when :p_bajo = 1 then ah.hb <= 7 else true end)
                        group by ah.anio
                        ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_bajo",$bajo);
                $sentencia->bindParam(":p_pacienteid",$paciente_id);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function find_analisisHistory(){

        try{
            $sql = "select count(*) as row
                    from analisis_history WHERE  id_paciente = :p_pacienteid";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_pacienteid", $this->id_paciente);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;


        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function hemo_baja(){
            try {
                $sql = "select count(*) as num from analisis_history where hb < 11;";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                return $resultado;

            } catch (Exception $ex) {
                throw $ex;
            }

    }




}