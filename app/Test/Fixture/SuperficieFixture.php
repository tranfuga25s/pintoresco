<?php
/**
 * SuperficieFixture
 *
 */
class SuperficieFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'superficie';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_superficie' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => false, 'default' => null),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'publicado' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_superficie', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id_superficie' => null,
			'codigo' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-05-20 22:54:35',
			'modified' => '2013-05-20 22:54:35',
			'publicado' => 1
		),
	);

}
