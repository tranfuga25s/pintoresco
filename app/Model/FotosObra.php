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
	
	public $validates = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, ingrese un titulo para la imagen.'
			)
		),
		'path' => array(
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
	
	// Subidor de archivos
	public $actsAs = array(
        'Upload.Upload' => array(
            'path' => array(
            	'path' => '{ROOT}webroot{DS}img{DS}obras{DS}',
            	'extensions' => array( 'jpg', 'bmp', 'jpeg', 'png', 'gif' )
			)
        )
    );
}
