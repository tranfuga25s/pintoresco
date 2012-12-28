<?php
/**
 * ConvenioFixture
 *
 */
class ConvenioFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'convenio';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_convenio' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'fecha_inicio' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'fecha_fin' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'documentacion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'forma_pago' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'descuento' => array('type' => 'float', 'null' => false, 'default' => null),
		'organismo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_convenio', 'unique' => 1)
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
			'id_convenio' => 1,
			'fecha_inicio' => '2012-12-28 00:30:24',
			'fecha_fin' => '2012-12-28 00:30:24',
			'documentacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'forma_pago' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'descuento' => 1,
			'organismo_id' => 1
		),
	);

}
