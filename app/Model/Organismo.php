<?php
App::uses('AppModel', 'Model');
/**
 * Organismo Model
 *
 * @property Convenio $Convenio
 */
class Organismo extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_organismo';

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
		'id_organismo' => array(
			'numeric' => array(
				'rule' => array('numeric')
			)
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre no puede estar vacío',
				'allowEmpty' => false,
				'required' => true
			)
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Convenio' => array(
			'className' => 'Convenio',
			'foreignKey' => 'organismo_id',
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

	public function beforeDelete( $cascade ) {
		$count = $this->Convenio->find( 'count', array( 'conditions' => array( 'organismo_id' => $this->id ) ) );
		if( $count > 0 ) {
			return false;
		}
		return true;
	}

}
