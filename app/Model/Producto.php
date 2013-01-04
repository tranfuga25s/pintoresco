<?php
App::uses('AppModel', 'Model');
/**
 * Producto Model
 *
 * @property Marca $Marca
 */
class Producto extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_producto';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Marca' => array(
			'className' => 'Marca',
			'foreignKey' => 'marca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
