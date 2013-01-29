<?php
App::uses('AppModel', 'Model');
/**
 * Pintor Model
 *
 * @property Usuario $Usuario
 * @property Obra $Obra
 */
class Pintor extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'pintor';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_pintor';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id_pintor' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'orden' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_doc' => array(
			'notempty' => array(
				'rule' => array( 'notempty' ),
				'message' => 'Por favor, seleccione algún tipo de número de documento',
				'required' => false
			)
		),
		'num_doc' => array(
			'numeric' => array(
				'rule'        => array( 'numeric' ),
				'message'    => 'Por favor, ingrese solo números para el número de documento',
				'allowEmpty' => true,
				'required'   => false
			),
			'length' => array(
				'rule'       => array( 'minLength', 8 ),
				'message'    => 'Por favor, ingrese 8 digitos para el numero de DNI',
				'allowEmpty' => true,
				'required'   => false
			) 
		)
	);

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Obra' => array(
			'className' => 'Obra',
			'foreignKey' => 'pintor_id',
			'dependent' => false
		)
	);
	
	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
        'Especialidad' =>
            array(
                'className'              => 'Especialidad',
                'joinTable'              => 'pintor_especialidad',
                'foreignKey'             => 'pintor_id',
                'associationForeignKey'  => 'especialidad_id',
                'fields'                 => array(  'Especialidad.id_especialidad', 'Especialidad.nombre' )
            )
		);
		
   /**
    * Listado de pintores con ID
    * Es utilizado así ya que es necesario mappear Pintor.id con Usuario.razonSocial
    * @return array Listado de IDPintor/RazonSocial
    * @author Esteban Zeller
    */		
	public function lista() {
		$data = $this->find( 'all', array( 'conditions' => array( 'Pintor.habilitado' => true ), 'recursive' => 1 ) );
		$ret = array();
		foreach( $data as $d ) {
			$ret[$d['Pintor']['id_pintor']] = $d['Usuario']['razonsocial'];
		}
		return $ret;
	}
}
