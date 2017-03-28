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
 * Table definition for PuntosRecogida
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class PuntosRecogida extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'PuntosRecogida';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'puntosRecogidaId';

    protected $_rowClass = 'Atezate\\Model\\PuntosRecogida';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\PuntosRecogida';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'PuntosRecogidaIbfk1' => array(
            'columns' => 'puntosRecogidaTiposId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PuntosRecogidaTipos',
            'refColumns' => 'puntosRecogidaTiposId'
        ),
        'PuntosRecogidaIbfk2' => array(
            'columns' => 'municipioId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Municipios',
            'refColumns' => 'municipioId'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\CentrosEmergencia',
        'Atezate\\Mapper\\Sql\\DbTable\\Cubos',
        'Atezate\\Mapper\\Sql\\DbTable\\Incidencias',
        'Atezate\\Mapper\\Sql\\DbTable\\Paradas',
        'Atezate\\Mapper\\Sql\\DbTable\\Postes',
        'Atezate\\Mapper\\Sql\\DbTable\\Recogidas',
        'Atezate\\Mapper\\Sql\\DbTable\\RutasRelPuntosRecogida',
        'Atezate\\Mapper\\Sql\\DbTable\\TurnosRelCamiones'
    );
    protected $_metadata = array (
	  'puntosRecogidaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'puntosRecogidaId',
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
	  'puntosRecogidaTiposId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'puntosRecogidaTiposId',
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
	  'nombreDescriptivo' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'nombreDescriptivo',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '100',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'municipioId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'municipioId',
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
	  'barrio' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'barrio',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '50',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'calle' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'calle',
	    'COLUMN_POSITION' => 6,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '50',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'numero' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'numero',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '10',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'posicion' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'posicion',
	    'COLUMN_POSITION' => 8,
	    'DATA_TYPE' => 'text',
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
	  'posicionAddr' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'posicionAddr',
	    'COLUMN_POSITION' => 9,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => '100',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'rfid' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'rfid',
	    'COLUMN_POSITION' => 10,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => '255',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'posicionLat' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'posicionLat',
	    'COLUMN_POSITION' => 11,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '7',
	    'PRECISION' => '10',
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'posicionLng' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosRecogida',
	    'COLUMN_NAME' => 'posicionLng',
	    'COLUMN_POSITION' => 12,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '7',
	    'PRECISION' => '10',
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
