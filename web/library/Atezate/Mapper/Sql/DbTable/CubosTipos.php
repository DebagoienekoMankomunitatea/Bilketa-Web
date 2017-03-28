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
 * Table definition for CubosTipos
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class CubosTipos extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'CubosTipos';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'cubosTiposId';

    protected $_rowClass = 'Atezate\\Model\\CubosTipos';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\CubosTipos';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'CubosTiposIbfk1' => array(
            'columns' => 'marcaCuboId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\MarcasCubo',
            'refColumns' => 'id'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\Cubos'
    );
    protected $_metadata = array (
	  'cubosTiposId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'cubosTiposId',
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
	  'tipo' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'tipo',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '500',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'litros' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'litros',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '2',
	    'PRECISION' => '4',
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'color' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'color',
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
	  'altura' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'altura',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '2',
	    'PRECISION' => '4',
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'anchura' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'anchura',
	    'COLUMN_POSITION' => 6,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '2',
	    'PRECISION' => '4',
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'longitud' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'longitud',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'decimal',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => '2',
	    'PRECISION' => '4',
	    'UNSIGNED' => true,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'llave' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'llave',
	    'COLUMN_POSITION' => 8,
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
	  'llenadoObligatorio' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'llenadoObligatorio',
	    'COLUMN_POSITION' => 9,
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
	  'marcaCuboId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'marcaCuboId',
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
	  'fabricante' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'CubosTipos',
	    'COLUMN_NAME' => 'fabricante',
	    'COLUMN_POSITION' => 11,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => '',
	    'NULLABLE' => false,
	    'LENGTH' => '30',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
