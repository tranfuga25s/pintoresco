<?php
App::uses('AppModel', 'Model');
/**
 * Superficie Model
 *
 */
class Superficie extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
	public $useTable = 'superficie';

    /**
     * Primary key field
     *
     * @var string
     */
	public $primaryKey = 'id_superficie';

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
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'El código debe ser numérico',
				'allowEmpty' => false
			)
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre no puede estar vacío',
				'allowEmpty' => false
			)
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean')
			)
		)
	);

    public $hasAndBelongsToMany = array(
        'Productos' => array(
            'className' => 'Producto',
            'joinTable' => 'productos_superficies',
            'foreignKey' => 'superficie_id',
            'associationForeignKey' => 'producto_id'
        )
    );
}
