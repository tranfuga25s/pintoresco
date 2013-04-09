<?php
/**
 * ObraFixture
 *
 */
class ObraFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'obra';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_obra' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'descripcion' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'pintor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_obra', 'unique' => 1)
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
			'id_obra' => 1,
			'fecha' => '2012-12-27',
			'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-12-27 18:07:27',
			'modified' => '2012-12-27 18:07:27',
			'pintor_id' => 1
		),
	);

}
