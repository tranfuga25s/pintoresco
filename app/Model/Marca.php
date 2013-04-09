<?php
App::uses('AppModel', 'Model');
/**
 * Marca Model
 *
 */
// Directorio para los logotipos 
 define( 'LOGOSDIR', /*WWW_ROOT . */'img' . DS . 'logos' . DS );
 
class Marca extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_marca';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'nombre';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'codigo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese un código para la marca',
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese un nombre para la marca'
			)
		),
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Por favor, ingrese una URL correcta'
			)
		),
		'simulador' => array(
		    'url' => array(
				'rule' => array( 'url' ),
				'message' => 'Por favor, ingrese una dirección válida',
				'requeried' => false,
				'allowEmpty' => true
		    )
		)
	);

	public $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'marca_id'
		)
	);

	public function listaSimuladores() {
	    return $this->find( 'all', array( 'conditions' => array( 'publicado' => true, 'NOT' => array( 'simulador' => null ) ),
						'recursive' => -1,
						'fields' => array( 'nombre', 'simulador' ) ) );
	}
	
	public function tieneRelaciones( $id ) {
		$count = $this->Producto->find( 'count', array( 'conditions' => array( 'marca_id' => $id ) ) );
		if( $count > 0 ) {
			return true;
		} else {
			return false;
		}
	}

}