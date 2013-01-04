<?php
App::uses('AppModel', 'Model');
/**
 * Obra Model
 *
 * @property Pintor $Pintor
 */
class Obra extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'obra';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_obra';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'fecha';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id_obra' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha' => array(
			'datetime' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pintor_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array belongsTo
	 */
	public $belongsTo = array(
		'Pintor' => array(
			'className' => 'Pintor',
			'foreignKey' => 'pintor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * hasMany association
	 * 
	 * @var array hasMany
	 */
	 /*public $hasMany = array(
	 	'Foto' => array(
	 		'classname' => 'Foto'
		) 
	 );*/
}
