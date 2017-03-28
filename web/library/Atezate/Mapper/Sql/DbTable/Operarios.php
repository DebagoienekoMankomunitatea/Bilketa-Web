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
 * Table definition for Operarios
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class Operarios extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'Operarios';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'operarioId';

    protected $_rowClass = 'Atezate\\Model\\Operarios';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\Operarios';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'OperariosIbfk1' => array(
            'columns' => 'rolId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Roles',
            'refColumns' => 'id'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\Revision',
        'Atezate\\Mapper\\Sql\\DbTable\\TurnosCamionesRelOperarios'
    );
    protected $_metadata = array (
	  'operarioId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Operarios',
	    'COLUMN_NAME' => 'operarioId',
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
	  'nombre' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Operarios',
	    'COLUMN_NAME' => 'nombre',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '30',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'rolId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Operarios',
	    'COLUMN_NAME' => 'rolId',
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
	);




}
