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

    /*!
     * @fn verificarSiExiste( $email )
     * Verifica que exista el email en la lista de usuarios.
     * @return Verdadero si el email está dado de alta en el sistema
     */
    public function verificarSiExiste( $email = null ) {
        $cantidad = $this->find( 'count', array( 'conditions' => array( 'email' => $email ) ) );
        if( $cantidad > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    /*!
     * @fn generarNuevaContraseñarray( $email, $contra )
     * Genera una nueva contraseña para el usuario, la coloca en la variable $contra y la asigna al email pasado como referencia.
     * @return Verdadero si el email está dado de alta en el sistema
     */
    public function generarNuevaContraseñarray( $email = null, &$contra = null ) {
        $str = "ABCDE2FGHIJKLM4NOPQRSTUVWXY2Zabcdefghij5klmnopqrstu2vwxyz1234567890";
        $contra = "";
        for( $i=0; $i<8; $i++ ) {
            $contra .= substr($str, rand(0,64), 1 );
        }
        $id = $this->find( 'first', array( 'conditions' => array( 'email' => $email ), 'fields' => 'id_usuario' ) );
        if( count( $id ) > 0 && $id['Usuario']['id_usuario'] != 0 ) {
            $this->id = $id['Usuario']['id_usuario'];
            if( !$this->saveField( 'contra', $contra ) ) {
                return false;
            } else {
                return $contra;
            }
        } else {
            // No debería de llegar aqui
            return false;
        }
        return $contra;
    }

}
