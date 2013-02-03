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

	/**
	 * Asociación entre los productos y su marca y categoría
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Marca' => array(
			'className' => 'Marca',
			'foreignKey' => 'marca_id'
		),
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id'
		)
	);
	
   /**
    * Asociación entre los productos y los materiales que se pueden pintar con el.
    * 
    * @var array
    */	
	
	public $hasAndBelongsToMany = array(
        'Material' =>
            array(
                'className'              => 'Material',
                'joinTable'              => 'productos_materiales',
                'foreignKey'             => 'producto_id',
                'associationForeignKey'  => 'material_id'
            )
		);
}
