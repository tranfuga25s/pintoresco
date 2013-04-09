<?php
/**
 * PintorFixture
 *
 */
class PintorFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pintor';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_pintor' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'orden' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'horario' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_pintor', 'unique' => 1)
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
			'id_pintor' => 1,
			'usuario_id' => 1,
			'orden' => 1,
			'created' => '2012-12-27 18:03:55',
			'modified' => '2012-12-27 18:03:55',
			'horario' => 'Lorem ipsum dolor sit amet'
		),
	);

}
