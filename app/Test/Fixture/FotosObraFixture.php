<?php
/**
 * FotosObraFixture
 *
 */
class FotosObraFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'fotos_obra';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_foto_obra' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'obra_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'titulo' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'path' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_foto_obra', 'unique' => 1)
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
			'id_foto_obra' => 1,
			'obra_id' => 1,
			'titulo' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'path' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-01-04 09:52:45',
			'modified' => '2013-01-04 09:52:45'
		),
	);

}
