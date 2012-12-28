<?php
App::uses('AppModel', 'Model');
/**
 * Convenio Model
 *
 * @property Organismo $Organismo
 */
class Convenio extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'convenio';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_convenio';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Organismo' => array(
			'className' => 'Organismo',
			'foreignKey' => 'organismo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
