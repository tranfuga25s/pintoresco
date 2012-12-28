<?php
/**
 * UsuarioFixture
 *
 */
class UsuarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'apellido' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'obra_social_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'notificaciones' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'contra' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'grupo_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'facebook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_usuario', 'unique' => 1)
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
			'id_usuario' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'nombre' => 'Lorem ipsum dolor sit amet',
			'apellido' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'celular' => 'Lorem ipsum dolor sit amet',
			'obra_social_id' => 1,
			'notificaciones' => 1,
			'contra' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'grupo_id' => 1,
			'facebook_id' => 1
		),
	);

}
