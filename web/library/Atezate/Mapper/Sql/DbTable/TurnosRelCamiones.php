<?php

/**
 * Application Model DbTables
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Table definition for TurnosRelCamiones
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class TurnosRelCamiones extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'TurnosRelCamiones';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_rowClass = 'Atezate\\Model\\TurnosRelCamiones';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\TurnosRelCamiones';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'TurnosRelCamionesIbfk1' => array(
            'columns' => 'turnoId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Turnos',
            'refColumns' => 'turnoId'
        ),
        'TurnosRelCamionesIbfk2' => array(
            'columns' => 'camionesId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Camiones',
            'refColumns' => 'camionId'
        ),
        'TurnosRelCamionesIbfk3' => array(
            'columns' => 'origenPuntoRecogidaId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PuntosRecogida',
            'refColumns' => 'puntosRecogidaId'
        ),
        'TurnosRelCamionesIbfk4' => array(
            'columns' => 'tabletId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Dispositivos',
            'refColumns' => 'id'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\Paradas',
        'Atezate\\Mapper\\Sql\\DbTable\\Posicionamiento',
        'Atezate\\Mapper\\Sql\\DbTable\\TurnosCamionesRelOperarios'
    );
    protected $_metadata = array (
	  'id' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'id',
	    'COLUMN_POSITION' => 1,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => true,
	    'PRIMARY_POSITION' => 1,
	    'IDENTITY' => true,
	  ),
	  'turnoId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'turnoId',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'camionesId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'camionesId',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'tabletId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'tabletId',
	    'COLUMN_POSITION' => 4,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'orden' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'orden',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => 'asc',
	    'NULLABLE' => false,
	    'LENGTH' => '4',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'origenPuntoRecogidaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'origenPuntoRecogidaId',
	    'COLUMN_POSITION' => 6,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'horaInicio' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TurnosRelCamiones',
	    'COLUMN_NAME' => 'horaInicio',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'time',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
