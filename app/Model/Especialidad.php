<?php
App::uses('AppModel', 'Model');
/**
 * Especialidad Model
 *
 */
class Especialidad extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'especialidad';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_especialidad';

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
		'id_especialidad' => array(
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
				'message' => 'El nombre no puede ser falso',
				'allowEmpty' => false,
				'required' => true
			)
		)
	);

	/**
	 * Vinculacion con los pintores
	 */
	 public $hasAndBelongsToMany = array(
	 	'Pintor' => array(
			'className'              => 'Pintor',
			'joinTable'              => 'pintor_especialidad',
			'foreignKey'             => 'especialidad_id',
			'associationForeignKey'  => 'pintor_id'
		)
	 );


	 public function beforeDelete( $cascade = true ) {
	 	$count = $this->query( 'SELECT COUNT(pintor_id) FROM pintor_especialidad WHERE especialidad_id = '.$this->id );
		if( intval( $count[0][0]['COUNT(pintor_id)'] ) > 0 ) {
			return false;
		}
		return true;
	 }

}
