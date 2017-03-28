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
 * Table definition for LogLlamadas
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class LogLlamadas extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'LogLlamadas';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'llamadasId';

    protected $_rowClass = 'Atezate\\Model\\LogLlamadas';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\LogLlamadas';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'LogLlamadasIbfk3' => array(
            'columns' => 'incidenciaId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Incidencias',
            'refColumns' => 'incidenciaId'
        ),
        'LogLlamadasIbfk4' => array(
            'columns' => 'plantillasTelefonoId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PlantillasTelefono',
            'refColumns' => 'id'
        )
    );
    
    protected $_metadata = array (
	  'llamadasId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'llamadasId',
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
	  'incidenciaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'incidenciaId',
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
	  'dia' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'dia',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'date',
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
	  'hora' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'hora',
	    'COLUMN_POSITION' => 4,
	    'DATA_TYPE' => 'time',
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
	  'contactado' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'contactado',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'tinyint',
	    'DEFAULT' => '0',
	    'NULLABLE' => false,
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
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'plantillasTelefonoId',
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
	  'telefono' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogLlamadas',
	    'COLUMN_NAME' => 'telefono',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '25',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
