<?php
App::uses('AppModel', 'Model');
/**
 * Promocion Model
 * @author Esteban Zeller
 */
class Promocion extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'promocion';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_promocion';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'titulo';

	/**
	 * Validation rules
	 *
	 * @var array $validate Reglas de validacion
	 */
	public $validate = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El titulo no puede estar vacío'
			)
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La descripción no puede estar vacía'
			)
		),
		'imagen' => array(
			'tamano' => array( 
				'rule' => 'isUnderPhpSizeLimit',
				'message' => 'El archivo excede el tamaño permitido'
			),
			'error' => array(
				'rule' => 'isCompletedUpload',
				'message' => 'El archivo no se pudo subir correctamente'
			),
			'escritura' => array(
				'rule' => 'isSuccessfulWrite',
				'message' => 'El archivo no se pudo escribir en el servidor'
			),
			'destino' => array(
				'rule' => array('isWritable'),
				'message' => 'El directorio de destino no es escribible'
			),
			'destino-noexiste' => array(
				'rule' => array('isValidDir'),
				'message' => 'El directorio de destino no existe'
			)
		)
	);
	
	// Subidor de archivos
	public $actsAs = array(
        'Upload.Upload' => array(
            'imagen' => array(
            	'path' => '{ROOT}webroot{DS}img{DS}promociones{DS}',
            	'extensions' => array( 'jpg', 'bmp', 'jpeg', 'png', 'gif' )
			)
        )
    );
	
	
   /**
    * Función que busca las promociones disponibles con el limite para que se vean en la pagina inicial
    * @author Esteban Zeller
    * @return array Promociones disponibles
    */	
	public function homePage() {
		return $this->find( 'all', array( 'conditions' => array( 'publicado' => true, 
																 'valido_hasta > NOW()',
																 'valido_desde <= NOW()' ),
										  'limit' => 4,
										  'recursive' => -1,
										  'fields' => array( 'titulo', 'descripcion', 'imagen', 'dir' ) ) );
	}
}
