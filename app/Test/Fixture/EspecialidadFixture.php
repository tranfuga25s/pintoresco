<?php
/**
 * EspecialidadFixture
 *
 */
class EspecialidadFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'especialidad';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_especialidad' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_especialidad', 'unique' => 1)
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
			'id_especialidad' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-12-26 13:52:40',
			'modified' => '2012-12-26 13:52:40'
		),
	);

}
