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

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Obra' => array(
			'className' => 'Obra',
			'foreignKey' => 'obra_id'
		)
	);
	
	public function beforeDelete( $cascade = null ) {
		$ruta = $this->field( 'path' );
		$arch = new File( WWW_ROOT.'img'.DS.$ruta );
		if( $arch->delete() ) {
			return true;
		} else {
			return false;
		}
	}
}
