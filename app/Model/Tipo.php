<?php
App::uses('AppModel', 'Model');
/**
 * Tipo Model
 *
 * @property Producto $Producto
 */
class Tipo extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_tipo';

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
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese un nombre para el tipo',
			),
		),
		'codigo' => array(
			'unico' => array(
				'rule' => array( 'isUnique' ),
				'message' => 'El codigo ingresado ya se encuentra utilizado.'
			)
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'tipo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function beforeDelete() {
		$count = $this->Producto->find( 'count', array( 'condition' => array( 'tipo_id' => $this->id ) ) );
		if( $count > 0 ) {
			return false;
		} 
		return true;
	}

}
