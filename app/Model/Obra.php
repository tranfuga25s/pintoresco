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
	 * Reglas de validación
	 *
	 * @var array
	 */
	public $validate = array(
		'id_obra' => array( 'numeric' => array( 'rule' => array('numeric') ) ),
		'fecha' => array(
			'datetime' => array(
				'rule' => array('date')
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese una minima descripción'
			),
		),
		'pintor_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, seleccione un pintor para la obra',
				'allowEmpty' => false,
				'required' => true
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
	 public $hasMany = array(
	 	'FotosObra' => array(
	 		'classname' => 'FotosObra'
		) 
	 );
	 
}
