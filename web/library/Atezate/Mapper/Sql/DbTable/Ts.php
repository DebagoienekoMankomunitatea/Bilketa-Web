<?php

/**
 * Application Model DbTables
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 170

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Table definition for Tablets
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class Ts extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'Tablets';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_rowClass = 'Atezate\\Model\\Tablets';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\Tablets';

    protected $_sequence = true; // int
    
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\TurnosRelCamiones'
    );
    protected $_metadata = array (
	  'id' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Tablets',
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
	  'marca' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Tablets',
	    'COLUMN_NAME' => 'marca',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '255',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'imei' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Tablets',
	    'COLUMN_NAME' => 'imei',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '255',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
