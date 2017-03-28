<?php
namespace Atezate;
use Atezate\Mapper\Sql as Mapper;
use Atezate\Model as Model;

class Frontend
{
    /**
     * @param int $pagina
     * @return array
     */
    public function fetchContribuyentes($pagina = 1)
    {
        $response = new Frontend\Fetch('Contribuyentes');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $contribuyenteId
     * @param int $cuboId
     */
    public function asociarContribuyenteCubo($contribuyenteId, $cuboId)
    {
        $response = new Frontend\FindOne('Cubos');

        $contribuyentesMapper = new Mapper\Contribuyentes;
        $cubosMapper = new Mapper\Cubos;
        $contribuyente = $contribuyentesMapper->find($contribuyenteId);
        if (!$contribuyenteId) {
            $response->setError(428, "Contribuyente desconocido");
            return $response->toArray();
        }

        $cubo = $cubosMapper->find($cuboId);
        if (!$cubo) {
            $response->setError(428, "Cubo no encontrado");
            return $response->toArray();
        }

        if (is_numeric($cubo->getContribuyenteId())) {
            //$response->setError(428, "El Cubo ya tiene contribuyente asignado");
        }

        try {
            $cubo->setContribuyenteId($contribuyenteId)->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('cuboId', $cuboId)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchCompostadoras($pagina = 1)
    {
        $response = new Frontend\Fetch('Compostadores');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchCentrosEmergencia ($pagina = 1)
    {
        $response = new Frontend\Fetch('CentrosEmergencia');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchCubos ($pagina = 1)
    {
        $response = new Frontend\Fetch('Cubos');
        $where = '"baja" = false';
        return $response->fetch($pagina, $where)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchDispositivos($pagina = 1)
    {
        $response = new Frontend\Fetch('Dispositivos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchCamiones($pagina = 1)
    {
        $response = new Frontend\Fetch('Camiones');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchMunicipios($pagina = 1)
    {
        $response = new Frontend\Fetch('Municipios');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $municipioId
     * @return array
     */
    public function fetchMunicipioById($municipioId)
    {
        $response = new Frontend\FindOne('Municipios');
        return $response->find('municipioId', $municipioId)->toArray();
    }


    /**
     * @param int $pagina
     * @return array
     */
    public function fetchPuntosRecogida($pagina = 1)
    {
        $response = new Frontend\Fetch('PuntosRecogida');
        $results = $response->fetch($pagina)->toArray();

        $rutasFetcher = new Frontend\Fetch('RutasRelPuntosRecogida');
        foreach ($results['resultados'] as $key => $record) {

            $where = '"puntosRecogidaId" = ' . $record['puntosRecogidaId'];
            $rutas = $rutasFetcher->fetch(1, $where)->toArray();
            $pks = array();

            foreach ($rutas['resultados'] as $ruta) {

                $pks[] = $ruta['rutaId'];
            }

            $results['resultados'][$key]['rutaId'] = array_unique($pks);
            $results['resultados'][$key]['query'] = $where;
        }

        return $results;
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchOperarios($pagina = 1)
    {
        $response = new Frontend\Fetch('Operarios');
        return $response->fetch($pagina, null, "nombre")->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchPostes($pagina = 1)
    {
        $response = new Frontend\Fetch('Postes');
        return $response->fetch($pagina, '"baja" = false', "postesIden")->toArray();
    }


    /**
     * @param int $pagina
     * @return array
     */
    public function fetchPuntosDescarga($pagina = 1)
    {
        $response = new Frontend\Fetch('PuntosDescarga');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchRutas($pagina = 1)
    {
        $response = new Frontend\Fetch('Rutas');
        return $response->fetch($pagina, null, "identificacion")->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchTurnosPendientesDeHoy($pagina = 1)
    {
        $response = new Frontend\Fetch('Turnos');
        $where = 'fecha =  CURRENT_DATE ' .
                 ' and "horaFinal" is null ' .
                 ' and "turnoId" not in (select "turnoId" from "TurnosRelCamiones" where "turnoId" is not null)';

        return $response->fetch($pagina, $where, 'horaInicio')->toArray();
    }


    /**
     * @param int $pagina
     * @return array
     */
    public function fetchTurnosEnCurso($pagina = 1)
    {
        $response = new Frontend\Fetch('TurnosRelCamiones');
        $where = '"turnoId" in (select "turnoId" from "Turnos" where ' .
                 ' "turnoId" is not null ' .
                 ' and "fecha" =  CURRENT_DATE ' .
                 ' and "horaFinal" is null ' .
                 ' and "turnoId" in (select "turnoId" from "TurnosRelCamiones" where "turnoId" is not null))';

        return $response->fetch($pagina, $where)->toArray();
    }


    /**
     * @param int rutaId
     * @param int fecha
     * @param int horaInicio
     */
    public function registrarTurno ($rutaId, $fecha, $horaInicio)
    {
        $response = new Frontend\FindOne('Turnos');
        $model = new Model\Turnos;

        $model->setRutaId($rutaId)
              ->setFecha($fecha)
              ->setHoraInicio($horaInicio);

        try {
            $model->save();
        } catch (\Exception $e) {
            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('turnoId', $model->getPrimaryKey())->toArray();
    }


    /**
     * @param int $idRuta
     * @param int $pagina
     * @return array
     */
    public function fetchPuntosRecogidaPorRuta($idRuta, $pagina = 1)
    {
        $mapper = new Mapper\RutasRelPuntosRecogida;
        $objects = $mapper->fetchList('"rutaId" = ' . intval($idRuta));

        $idPuntos = array(-1);
        foreach ($objects as $itemRel) {
            $idPuntos[] = $itemRel->getPuntosRecogidaId();
        }

        $response = new Frontend\Fetch('PuntosRecogida');

        $where = '"puntosRecogidaId" in ('.implode(", ", $idPuntos).')';
        return $response->fetch($pagina, $where)->toArray();
    }

    /**
     * @param int $idTurno
     * @param int $pagina
     * @return array
     */
    public function fetchPuntosRecogidaPendienteEnTurno($idTurno, $pagina = 1)
    {
        $mapper = new Mapper\Turnos;
        $turno = $mapper->find($idTurno);

        if (!$turno) {

            $response = new Frontend\Fetch('PuntosRecogida');
            $response->setError(428, 'Turno desconocido');
            return $response->toArray();
        }

        if ($turno->getHoraFinal()) {

            $response = new Frontend\Fetch('PuntosRecogida');
            return $response->fetch($pagina, 'false')->toArray();
        }

        if (!$turno->getTurnosRelCamiones()) {

            return $this->fetchPuntosRecogidaPorRuta($turno->getRutaId());
        }

        $turnoRelCamionIds = array(-1);
        $turnosRelCamiones = $turno->getTurnosRelCamiones();

        foreach ($turnosRelCamiones as $tupla) {

            $turnoRelCamionIds[] = $tupla->getPrimarykey();
        }

        $mapper = new Mapper\RutasRelPuntosRecogida;
        $objects = $mapper->fetchList('"rutaId" = ' . $turno->getRutaId());

        $idPuntos = array(-1);
        foreach ($objects as $itemRel) {
            $idPuntos[] = $itemRel->getPuntosRecogidaId();
        }

        $response = new Frontend\Fetch('PuntosRecogida');

        $where = '"puntosRecogidaId" in ('. implode(", ", $idPuntos). ')' .
                 ' and "puntosRecogidaId" not in (select "puntosRecogidasId" from "Paradas"' .
                 ' where "puntosRecogidasId" is not null and "turnosCamionesId" in ('. implode(',', $turnoRelCamionIds) .'))';

        return $response->fetch($pagina, $where)->toArray();
    }

    /**
     * @param int $puntoRecogidaId
     * @param int $pagina
     * @return array
     */
    public function fetchPostesEnPuntoRecogida ($puntoRecogidaId, $pagina = 1)
    {
        $response = new Frontend\Fetch('Postes');
        $where = '"baja" = false and "puntosRecogidaId" = ' . intval($puntoRecogidaId);
        return $response->fetch($pagina, $where)->toArray();
    }


    /**
     * @param int $puntoRecogidaId
     * @param int $pagina
     * @return array
     */
    public function fetchCubosEnPuntoRecogida ($puntoRecogidaId, $pagina = 1)
    {
        $response = new Frontend\Fetch('Cubos');
        $where = '"baja" = false and "puntosRecogidaId" = ' . intval($puntoRecogidaId);
        return $response->fetch($pagina, $where)->toArray();
    }

    /**
     * @param int $posteId
     * @param int $pagina
     * @return array
     */
    public function fetchCubosAsociadosPoste ($posteId, $pagina = 1)
    {
        $response = new Frontend\Fetch('Cubos');
        $where = '"baja" = false and "posteId" = ' . intval($posteId);
        return $response->fetch($pagina, $where)->toArray();
    }

    /**
     * @param int turnoId
     * @param int camionId
     * @param int tabletId
     * @param array operarios
     * @param int primerPuntoRecogidaId
     * @param string orden
     * @return array
     */
    public function iniciarTurno ($turnoId, $camionId, $tabletId, $operarios, $primerPuntoRecogidaId = null, $orden = 'asc')
    {
        $turnosMapper = new Mapper\Turnos;
        $turno = $turnosMapper->find($turnoId);

        $inicio = date("H:i:s");
        if ($turno) {
            $inicioTurno = $turno->getFecha() . " " . $turno->getHoraInicio();

            if (strtotime($turno->getFecha() . " " . $inicio) < strtotime($inicioTurno)) {
                $inicio = $turno->getHoraInicio();
            }
        }

        $response = new Frontend\FindOne('TurnosRelCamiones');
        $model = new Model\TurnosRelCamiones;

        if (is_null($primerPuntoRecogidaId)) {
            //TODO
        }

        $model->setTurnoId($turnoId)
              ->setCamionesId($camionId)
              ->setTabletId($tabletId)
              ->setOrigenPuntoRecogidaId($primerPuntoRecogidaId)
              ->setOrden($orden)
              ->setHoraInicio($inicio);

        try {
            $model->save();
            foreach ($operarios as $operario) {

                $relOperario = new Model\TurnosCamionesRelOperarios;
                $relOperario->setTurnosRelCamionesId($model->getPrimaryKey())
                            ->setOperarioId($operario)
                            ->save();
            }

        } catch (\Exception $e) {
            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('id', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int turnosCamionesId
     * @param string horaInicio
     * @param int puntosRecogidasId
     * @return array
     */
    public function iniciarParada ($turnosCamionesId, $horaInicio, $puntosRecogidasId)
    {
        $response = new Frontend\FindOne('Paradas');
        $model = new Model\Paradas;

        try {

            $model->setTurnosCamionesId($turnosCamionesId)
                  ->setHoraInicio($horaInicio)
                  ->setPuntosRecogidasId($puntosRecogidasId)
                  ->save();
        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('paradaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int cuboId
     * @param int paradaId
     * @param int recogidaTipoId
     */
    public function registrarRecogidaEnPoste($cuboId, $paradaId, $recogidaTipoId)
    {
        $response = new Frontend\FindOne('Recogidas');

        $cubosMapper = new Mapper\Cubos;
        $cubo = $cubosMapper->find($cuboId);

        if (!$cubo || !$cubo->getPosteId()) {

            $message = !$cubo ? 'Cubo desconocido' : 'El cubo indicado no tiene poste asignado';
            $response->setError(428, $message);
            return $response->toArray();
        }

        $model = new Model\Recogidas;

        try {

            $model->setCuboId($cuboId)
                  ->setRecogidaTipoId($recogidaTipoId)
                  ->setTipos('poste')
                  ->setPosteId($cubo->getPosteId())
                  ->setParadaId($paradaId)
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('id', $model->getPrimaryKey())->toArray();
    }

    // /**
     // * @param int cuboId
     // * @param int centroEmergenciaId
     // * @param int paradaId
     // * @param int recogidaTipoId
     // */
    // public function registrarRecogidaEnCentroEmergencia($cuboId, /*$centroEmergenciaId,*/ $paradaId, $recogidaTipoId)
    // {
      // // `recogidaTipoId` mediumint(8) unsigned DEFAULT NULL,
      // // `cuboId` mediumint(8) unsigned DEFAULT NULL COMMENT 'Este campo no podrá ser NULL (lo comprobaremos a nivel\ncódigo). Se mantiene así por los logs.',
      // // `tipos` enum('centroEmergencia') NOT NULL,
      // // `centroEmergenciaId` mediumint(8) unsigned DEFAULT NULL,
      // // `paradaId` mediumint(8) unsigned DEFAULT NULL COMMENT 'Este campo se tratará como NOT NULL a nivel de aplicación',
    // }

    /**
     * @param int cuboId
     * @param int paradaId
     * @param int recogidaTipoId
     */
    public function registrarRecogidaEnPuntoRecogida($cuboId, $paradaId, $recogidaTipoId)
    {
        $response = new Frontend\FindOne('Recogidas');

        $cubosMapper = new Mapper\Cubos;
        $cubo = $cubosMapper->find($cuboId);

        if (!$cubo || !$cubo->getPuntosRecogidaId()) {

            $message = !$cubo ? 'Cubo desconocido' : 'El cubo indicado no tiene un punto de recogida asignado';
            $response->setError(428, $message);
            return $response->toArray();
        }

        $model = new Model\Recogidas;

        try {

            $model->setCuboId($cuboId)
                  ->setRecogidaTipoId($recogidaTipoId)
                  ->setTipos('puntoRecogida')
                  ->setPuntoRecogidaId($cubo->getPuntosRecogidaId())
                  ->setParadaId($paradaId)
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('id', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int paradaId
     * @param int cuboId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     */
    public function reportarIncidenciaDeCubo($paradaId, $cuboId, $tipoId, $fecha, $observaciones)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setParadaId($paradaId)
                  ->setCuboId($cuboId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('cubo')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int paradaId
     * @param int posteId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     */
    public function reportarIncidenciaDePoste($paradaId, $posteId, $tipoId, $fecha, $observaciones)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setParadaId($paradaId)
                  ->setPostesId($posteId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('poste')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int compostadorId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     * @param int paradaId
     */
    public function reportarIncidenciaDeCompostadora($compostadorId, $tipoId, $fecha, $observaciones, $paradaId = null)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setParadaId($paradaId)
                  ->setCompostadorId($compostadorId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('compostador')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int camionId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     */
    public function reportarIncidenciaDeCamion($camionId, $tipoId, $fecha, $observaciones)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setCamionId($camionId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('camion')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int contribuyenteId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     */
    public function reportarIncidenciaDeContribuyente($contribuyenteId, $tipoId, $fecha, $observaciones)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setContribuyenteId($contribuyenteId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('contribuyente')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int paradaId
     * @param int puntoRecogidaId
     * @param int tipoId
     * @param string fecha
     * @param string observaciones
     */
    public function reportarIncidenciaDePuntoDeRecogida($paradaId, $puntoRecogidaId, $tipoId, $fecha, $observaciones)
    {
        $response = new Frontend\FindOne('Incidencias');
        $model = new Model\Incidencias;

        try {

            $model->setParadaId($paradaId)
                  ->setPuntoRecogidaId($puntoRecogidaId)
                  ->setTipoId($tipoId)
                  ->setFechaAlta($fecha)
                  ->setObservaciones($observaciones)
                  ->setEntidad('puntoRecogida')
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('incidenciaId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int compostadoresId
     * @param string fechaHora
     * @param int operadorId
     * @param int revisionTipoId
     * @param string observaciones
     */
    public function registrarRevisionCompostadora($compostadoresId, $fechaHora, $operadorId, $revisionTipoId, $observaciones)
    {
        $response = new Frontend\FindOne('Revision');
        $model = new Model\Revision;

        try {

            $model->setCompostadoresId($compostadoresId)
                  ->setFechaHora($fechaHora)
                  ->setOperadorId($operadorId)
                  ->setRevisionTipoId($revisionTipoId)
                  ->setObservaciones($observaciones)
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('revisionId', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int idParada
     * @param int horaFin
     * @return array
     */
    public function finalizarParada ($idParada, $horaFin)
    {
        $mapper = new Mapper\Paradas;
        $model = $mapper->find($idParada);

        if (!$model) {

            $response = new Frontend\Fetch('Paradas');
            $response->setError(428, 'Parada desconocida');
            return $response->toArray();
        }

        $model->setHoraFinal($horaFin)
              ->setFinalizado(true)
              ->save();

        $response = new Frontend\FindOne('Paradas');
        return $response->find('paradaId', $idParada)->toArray();
    }


    /**
     * @param int camionId
     * @param int puntoDescargaId
     * @param int kilos
     */
    public function registrarDescarga($camionId, $puntoDescargaId, $kilos)
    {
        $response = new Frontend\FindOne('Descargas');
        $model = new Model\Descargas;

        try {

            $model->setCamionId($camionId)
                  ->setPuntoDescargaId($puntoDescargaId)
                  ->setKilos($kilos)
                  ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        return $response->find('id', $model->getPrimaryKey())->toArray();
    }

    /**
     * @param int turnosRelCamionesId
     * @param string precision
     * @param string fechaHora
     * @param float lat
     * @param float lng
     */
    public function registrarPosicion($turnosRelCamionesId, $precision, $fechaHora, $lat, $lng)
    {
        $response = new Frontend\FindOne('Posicionamiento');
        $model = new Model\Posicionamiento;

        try {

            //$pos = new \Zend_Db_Expr('ST_SetSRID( ST_Point('. $lng .', '. $lat .'), 4326)');
            $model->setTurnosCamionesId($turnosRelCamionesId)
                  ->setPrecision($precision)
                  ->setFecha($fechaHora)
                  ->setPosicionLat($lat)
                  ->setPosicionLng($lng)
                  //->setPosicion($pos) //Delegar en mapper::_save
                  ->save();

            $camion = $model->getTurnosCamiones()->getCamiones();
            $camion->setPrecision($precision)
                   ->setCuandoPosicion($fechaHora)
                   ->setPosicionLat($lat)
                   ->setPosicionLng($lng)
                   //->setPosicion($pos) //Delegar en mapper::_save
                   ->save();

        } catch (\Exception $e) {

            $response->setError(500, $e->getMessage());
            return $response->toArray();
        }

        $response = $response->find('posicionamientoId', $model->getPrimaryKey())->toArray();

        if (
            is_array($response) && array_key_exists('resultados', $response)
            && array_key_exists('posicion', $response['resultados'])
            && $response['resultados']['posicion'] != ''
        ) {

            $response['resultados']['posicionLat'] = $lat;
            $response['resultados']['posicionLng'] = $lng;
        }

        return $response;
    }

    public function fetchPosicionCamionesEnRuta()
    {
        $response = new Frontend\Fetch('Posicionamiento');
        $posicionamientoMapper = new Mapper\Posicionamiento;
        $dbAdapter = $posicionamientoMapper->getDbTable()->getAdapter();

        $where = 'SELECT distinct on ("turnosCamionesId") "turnosCamionesId", fecha, "turnosCamionesId", precision, "createdOn", posicion,
                  ST_X(posicion) as posicionLng, ST_Y(posicion) as posicionLat FROM "Posicionamiento" WHERE ("turnosCamionesId" in
                  ( select "id" from "TurnosRelCamiones" where "turnoId" in (select "turnoId" from "Turnos" where "turnoId" is not null and
                  "fecha" =  CURRENT_DATE and "horaFinal" is null and "turnoId" in (select "turnoId" from "TurnosRelCamiones" where "turnoId" is
                  not null)))) order by "turnosCamionesId", fecha desc';

        try {

            $dbRecords = $dbAdapter->query($where)->fetchAll();
            $response->setResults($dbRecords);

        } catch (\Exception $exception) {
            $response->setError(500, $exception->getMessage());
        }

        return $response->toArray();
    }

       ///////////////////////////////////////////////////////
      /////////////////////// MARCAS ////////////////////////
     ///////////////////////////////////////////////////////
    /**
     * @param int $pagina
     * @return array
     */
     public function fetchMarcasCompostador ($pagina = 1)
     {
        $response = new Frontend\Fetch('MarcasCompostador');
        return $response->fetch($pagina)->toArray();
     }

    /**
     * @param int $pagina
     * @return array
     */
     public function fetchMarcasCubo ($pagina = 1)
     {
        $response = new Frontend\Fetch('MarcasCubo');
        return $response->fetch($pagina)->toArray();
     }

    /**
     * @param int $pagina
     * @return array
     */
     public function fetchMarcasDispositivo ($pagina = 1)
     {
        $response = new Frontend\Fetch('MarcasDispositivo');
        return $response->fetch($pagina)->toArray();
     }

    /**
     * @param int $pagina
     * @return array
     */
     public function fetchMarcasPoste ($pagina = 1)
     {
        $response = new Frontend\Fetch('MarcasPoste');
        return $response->fetch($pagina)->toArray();
     }

       ///////////////////////////////////////////////////////
      ////////////////////// MAESTROS ///////////////////////
     ///////////////////////////////////////////////////////
    /**
     * @param int $pagina
     * @return array
     */
    public function fetchCubosTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('CubosTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchPostesTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('PostesTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchPuntosRecogidaTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('PuntosRecogidaTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchRecogidaTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('RecogidaTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchResiduosTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('ResiduosTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchRevisionTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('RevisionTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchRoles($pagina = 1)
    {
        $response = new Frontend\Fetch('Roles');
        return $response->fetch($pagina)->toArray();
    }
    /**
     * @param int $pagina
     * @return array
     */

    public function fetchRutasTipos($pagina = 1)
    {
        $response = new Frontend\Fetch('RutasTipos');
        return $response->fetch($pagina)->toArray();
    }

    /**
     * @param int $pagina
     * @return array
     */
    public function fetchTiposIncidencias($pagina = 1)
    {
        $response = new Frontend\Fetch('TiposIncidencias');
        return $response->fetch($pagina)->toArray();
    }
}

