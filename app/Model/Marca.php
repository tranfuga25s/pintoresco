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
		'id_marca' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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


	public function listaSimuladores() {
	    return $this->find( 'all', array( 'conditions' => array( 'publicado' => true, 'NOT' => array( 'simulador' => null ) ),
						'recursive' => -1,
						'fields' => array( 'nombre', 'simulador' ) ) );
	}

}