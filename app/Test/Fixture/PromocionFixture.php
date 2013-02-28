<?php
/**
 * PromocionFixture
 *
 */
class PromocionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'promocion';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_promocion' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'descripcion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'imagen' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'valido_desde' => array('type' => 'date', 'null' => true, 'default' => null),
		'valido_hasta' => array('type' => 'date', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_promocion', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id_promocion' => 1,
			'titulo' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'imagen' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2013-02-18 21:26:29',
			'modified' => '2013-02-18 21:26:29',
			'valido_desde' => '2013-02-18',
			'valido_hasta' => '2013-02-18'
		),
	);

}
