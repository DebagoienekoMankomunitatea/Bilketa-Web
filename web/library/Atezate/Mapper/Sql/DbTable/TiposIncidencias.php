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
 * Table definition for TiposIncidencias
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class TiposIncidencias extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'TiposIncidencias';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'tipoId';

    protected $_rowClass = 'Atezate\\Model\\TiposIncidencias';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\TiposIncidencias';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'TiposIncidenciasIbfk1' => array(
            'columns' => 'plantillasEmailId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PlantillasEmail',
            'refColumns' => 'id'
        ),
        'TiposIncidenciasIbfk2' => array(
            'columns' => 'plantillasSmsId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PlantillasSms',
            'refColumns' => 'id'
        ),
        'TiposIncidenciasIbfk3' => array(
            'columns' => 'plantillasTelefonoId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PlantillasTelefono',
            'refColumns' => 'id'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\Incidencias'
    );
    protected $_metadata = array (
	  'tipoId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'tipoId',
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
	  'gravedad' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'gravedad',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => 'moderada',
	    'NULLABLE' => false,
	    'LENGTH' => '9',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'tipo' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'tipo',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => '13',
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
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'descripcion',
	    'COLUMN_POSITION' => 4,
	    'DATA_TYPE' => 'mediumtext',
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
	  'resolucionAutomatica' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'resolucionAutomatica',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'tinyint',
	    'DEFAULT' => '0',
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'plantillasEmailId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasEmailId',
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
	  'plantillasEmailPrioridad' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasEmailPrioridad',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'tinyint',
	    'DEFAULT' => '1',
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'plantillasSmsId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasSmsId',
	    'COLUMN_POSITION' => 8,
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
	  'plantillasSmsPrioridad' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasSmsPrioridad',
	    'COLUMN_POSITION' => 9,
	    'DATA_TYPE' => 'tinyint',
	    'DEFAULT' => '1',
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'plantillasTelefonoId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasTelefonoId',
	    'COLUMN_POSITION' => 10,
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
	  'plantillasTelefonoPrioridad' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'TiposIncidencias',
	    'COLUMN_NAME' => 'plantillasTelefonoPrioridad',
	    'COLUMN_POSITION' => 11,
	    'DATA_TYPE' => 'tinyint',
	    'DEFAULT' => '1',
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
