<?php
/**
 * TipoFixture
 *
 */
class TipoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_tipo' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_tipo', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id_tipo' => null,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-03-12 23:36:11',
			'modified' => '2013-03-12 23:36:11'
		),
	);

}
