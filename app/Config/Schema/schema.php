<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $usuarios = array(
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'apellido' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'contra' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'grupo_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'facebook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_usuario', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);
	
	public $grupos = array(
		'id_grupo' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish2_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_grupo', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish2_ci', 'engine' => 'InnoDB')
	);
        
        public $convenios = array(
            'id_convenio' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
            'fecha_inicio' => array('type' => 'datetime', 'null' => false, 'default' => null),
            'fecha_fin' => array('type' => 'datetime', 'null' => false, 'default' => null),
            'documentacion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
            'forma_pago' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
            'descuento' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
            'organismo_id' => array('type'=>'biginteger', 'null' => false, 'default' => null ),
            'indexes' => array(
                'PRIMARY' => array('column' => 'id_convenio', 'unique' => 1)
            ),
            'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish2_ci', 'engine' => 'InnoDB')
        );
}
