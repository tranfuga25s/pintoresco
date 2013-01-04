<?php
App::uses('AppModel', 'Model');
/**
 * FotosObra Model
 *
 * @property Obra $Obra
 */
class FotosObra extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'fotos_obra';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_foto_obra';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'titulo';

	/*public $actAs = array(
		'Uploader.Attachment' => array(
			'dbColumn' => 'path',
			'defaultPath' => WWW_ROOT . 'img' . DS . 'obras',
			'overwrite' => false,
			'allowEmpty' => false 
		)
	);*/
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Obra' => array(
			'className' => 'Obra',
			'foreignKey' => 'obra_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
