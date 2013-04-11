<?php
App::uses('AppModel', 'Model');
/**
 * Marca Model
 *
 */
 
class Marca extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_marca';

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
		'codigo' => array(
			'notempty' => array(
				'rule' => array( 'notempty' ),
				'message' => 'Por favor, ingrese un código para la marca',
			),
			'unique' => array(
				'rule'    => 'isUnique',
	        	'message' => 'El codigo utilizado ya está en uso con otra marca.'
			)
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese un nombre para la marca.'
			)
		),
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Por favor, ingrese una URL correcta.'
			)
		),
		'simulador' => array(
		    'url' => array(
				'rule' => array( 'url' ),
				'message' => 'Por favor, ingrese una dirección válida.',
				'requeried' => false,
				'allowEmpty' => true
		    )
		),
		'logo' => array(
			'maxlimit' => array(
        		'rule' => 'isUnderPhpSizeLimit',
        		'message' => 'El tamaño del archivo excede el maximo permitido'
        	),
        	'nocomplete' => array(
        		'rule' => 'isCompletedUpload',
        		'message' => 'El archivo no pudo ser subido correctamente'
			),
			'tempdir' => array(
				'rule' => 'tempDirExists',
        		'message' => 'Existe un problema con el directorio temporal'
			),
			'write' => array(
        		'rule' => 'isSuccessfulWrite',
        		'message' => 'El archivo no pudo ser escrito en el servidor'
    		)
    	)
	);

	public $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'marca_id'
		)
	);
	
	// Subidor de archivos
	public $actsAs = array(
        'Upload.Upload' => array(
            'logo' => array(
            	'path' => '{ROOT}webroot{DS}img{DS}logos{DS}',
            	'extensions' => array( 'jpg', 'bmp', 'jpeg', 'png', 'gif' )
			)
        )
    );

	public function listaSimuladores() {
	    return $this->find( 'all', array( 'conditions' => array( 'publicado' => true, 'NOT' => array( 'simulador' => null ) ),
						'recursive' => -1,
						'fields' => array( 'nombre', 'simulador' ) ) );
	}
	
	public function tieneRelaciones( $id ) {
		$count = $this->Producto->find( 'count', array( 'conditions' => array( 'marca_id' => $id ) ) );
		if( $count > 0 ) {
			return true;
		} else {
			return false;
		}
	}

}