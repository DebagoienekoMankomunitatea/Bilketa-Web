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
 * Table definition for PuntosDescarga
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class PuntosDescarga extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'PuntosDescarga';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'puntosDescargaId';

    protected $_rowClass = 'Atezate\\Model\\PuntosDescarga';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\PuntosDescarga';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'FkPuntosDescargaResiduosTipos1' => array(
            'columns' => 'residuosTiposId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\ResiduosTipos',
            'refColumns' => 'residuosTiposId'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\Descargas',
        'Atezate\\Mapper\\Sql\\DbTable\\Rutas'
    );
    protected $_metadata = array (
	  'puntosDescargaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'puntosDescargaId',
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
	  'puntosDescargaIden' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'puntosDescargaIden',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '7',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'residuosTiposId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'residuosTiposId',
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
	  'nombre' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'nombre',
	    'COLUMN_POSITION' => 4,
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
	  'descripcion' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'descripcion',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'text',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
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
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'posicion',
	    'COLUMN_POSITION' => 6,
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
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'posicionAddr',
	    'COLUMN_POSITION' => 7,
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
	  'posicionLat' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'posicionLat',
	    'COLUMN_POSITION' => 8,
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
	    'TABLE_NAME' => 'PuntosDescarga',
	    'COLUMN_NAME' => 'posicionLng',
	    'COLUMN_POSITION' => 9,
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
