<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 */
class Usuario extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_usuario';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'nombre';


	public $virtualFields = array(
		'razonsocial' => 'CONCAT( Usuario.apellido, \', \', Usuario.nombre )' );
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id_usuario' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Por favor, ingrese una dirección de correo válida',
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
		'apellido' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefono' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'El número de telefono solo puede ser numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'celular' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'El numero de teléfono debe ser solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contra' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	public $belongsTo = array( 'Grupo' => 
						array( 'className'  => 'Grupo', 
							   'foreignKey' => 'grupo_id' ) );
							 
	// Esta funcion encripta las contraseñas antes de guardarlas en la base de datos
	function beforeSave($options = array()) {
		if( isset( $this->data['Usuario']['contra'] ) ) {
			$this->data['Usuario']['contra'] = AuthComponent::password( $this->data['Usuario']['contra'] );
		}
		return true;
	}
}
