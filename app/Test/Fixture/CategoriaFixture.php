<?php
/**
 * CategoriaFixture
 *
 */
class CategoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_categoria' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'nombre' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish2_ci', 'charset' => 'utf8'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'lft' => array('type' => 'integer', 'null' => false, 'default' => null),
		'rght' => array('type' => 'integer', 'null' => false, 'default' => null),
		'publicado' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'descripcion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish2_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_categoria', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish2_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id_categoria' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'parent_id' => 1,
			'lft' => 1,
			'rght' => 1,
			'publicado' => 1,
			'created' => '2013-01-29 19:33:35',
			'modified' => '2013-01-29 19:33:35',
			'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
