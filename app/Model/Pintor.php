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
                'associationForeignKey'  => 'especialidad_id'
            )
		);
}
