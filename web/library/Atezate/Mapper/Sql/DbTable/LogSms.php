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
 * Table definition for LogSms
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class LogSms extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'LogSms';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'smsMensajeId';

    protected $_rowClass = 'Atezate\\Model\\LogSms';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\LogSms';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'LogSmsIbfk1' => array(
            'columns' => 'incidenciaId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Incidencias',
            'refColumns' => 'incidenciaId'
        ),
        'LogSmsIbfk2' => array(
            'columns' => 'plantillasSmsId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PlantillasSms',
            'refColumns' => 'id'
        )
    );
    
    protected $_metadata = array (
	  'smsMensajeId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'smsMensajeId',
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
	  'mensaje' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'mensaje',
	    'COLUMN_POSITION' => 2,
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
	  'createdOn' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'createdOn',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'timestamp',
	    'DEFAULT' => 'CURRENT_TIMESTAMP',
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'incidenciaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'incidenciaId',
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
	  'telefono' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'telefono',
	    'COLUMN_POSITION' => 5,
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
	  'plantillasSmsId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'LogSms',
	    'COLUMN_NAME' => 'plantillasSmsId',
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
	);




}
