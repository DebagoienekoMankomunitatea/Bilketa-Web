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
 * Table definition for Incidencias
 *
 * @package Atezate\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\DbTable;
class Incidencias extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'Incidencias';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'incidenciaId';

    protected $_rowClass = 'Atezate\\Model\\Incidencias';
    protected $_rowMapperClass = 'Atezate\\Mapper\\Sql\\Incidencias';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'IncidenciasIbfk1' => array(
            'columns' => 'cuboId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Cubos',
            'refColumns' => 'cuboId'
        ),
        'IncidenciasIbfk10' => array(
            'columns' => 'puntoRecogidaId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\PuntosRecogida',
            'refColumns' => 'puntosRecogidaId'
        ),
        'IncidenciasIbfk11' => array(
            'columns' => 'contribuyenteId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes',
            'refColumns' => 'contribuyenteId'
        ),
        'IncidenciasIbfk12' => array(
            'columns' => 'paradaId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Paradas',
            'refColumns' => 'paradaId'
        ),
        'IncidenciasIbfk13' => array(
            'columns' => 'tipoId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\TiposIncidencias',
            'refColumns' => 'tipoId'
        ),
        'IncidenciasIbfk2' => array(
            'columns' => 'postesId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Postes',
            'refColumns' => 'postesId'
        ),
        'IncidenciasIbfk6' => array(
            'columns' => 'compostadorId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Compostadores',
            'refColumns' => 'compostadoresId'
        ),
        'IncidenciasIbfk9' => array(
            'columns' => 'camionId',
            'refTableClass' => 'Atezate\\Mapper\\Sql\\DbTable\\Camiones',
            'refColumns' => 'camionId'
        )
    );
    protected $_dependentTables = array(
        'Atezate\\Mapper\\Sql\\DbTable\\LogEmails',
        'Atezate\\Mapper\\Sql\\DbTable\\LogLlamadas',
        'Atezate\\Mapper\\Sql\\DbTable\\LogSms'
    );
    protected $_metadata = array (
	  'incidenciaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'incidenciaId',
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
	  'fechaAlta' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'fechaAlta',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'datetime',
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
	  'entidad' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'entidad',
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
	  'cuboId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'cuboId',
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
	  'postesId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'postesId',
	    'COLUMN_POSITION' => 5,
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
	  'compostadorId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'compostadorId',
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
	  'camionId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'camionId',
	    'COLUMN_POSITION' => 7,
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
	  'contribuyenteId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'contribuyenteId',
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
	  'puntoRecogidaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'puntoRecogidaId',
	    'COLUMN_POSITION' => 9,
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
	  'solucionada' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'solucionada',
	    'COLUMN_POSITION' => 10,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => 'no',
	    'NULLABLE' => false,
	    'LENGTH' => '10',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'observacionSolucion' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'observacionSolucion',
	    'COLUMN_POSITION' => 11,
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
	  'tipoId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'tipoId',
	    'COLUMN_POSITION' => 12,
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
	  'observaciones' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'observaciones',
	    'COLUMN_POSITION' => 13,
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
	  'paradaId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'paradaId',
	    'COLUMN_POSITION' => 14,
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
	  'createdOn' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'Incidencias',
	    'COLUMN_NAME' => 'createdOn',
	    'COLUMN_POSITION' => 15,
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
	);




}
