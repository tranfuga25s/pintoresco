<?php
App::uses('AppModel', 'Model');
/**
 * Material Model
 *
 */
class Material extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'materiales';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_material';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'nombre';

}
