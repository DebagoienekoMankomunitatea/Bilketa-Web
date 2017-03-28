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
 * Table definition for CompostadoresRelContribuyentes
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class CompostadoresRelContribuyentes extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'CompostadoresRelContribuyentes';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'idRel';

    protected $_rowClass = 'Atezate\\Model\\CompostadoresRelContribuyentes';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\CompostadoresRelContribuyentes';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'CompostadoresRelContribuyentesIbfk1' => array(
            'columns' => 'contribuyenteId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes',
            'refColumns' => 'contribuyenteId'
        ),
        'CompostadoresRelContribuyentesIbfk2' => array(
            'columns' => 'compostadoresId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Compostadores',
            'refColumns' => 'compostadoresId'
        )
    );
    
    protected $_metadata = array (
	  'idRel' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CompostadoresRelContribuyentes',
	    'COLUMN_NAME' => 'idRel',
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
	  'compostadoresId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CompostadoresRelContribuyentes',
	    'COLUMN_NAME' => 'compostadoresId',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'contribuyenteId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CompostadoresRelContribuyentes',
	    'COLUMN_NAME' => 'contribuyenteId',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
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
