<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 * @property Categoria $ParentCategoria
 * @property Categoria $ChildCategoria
 */
class Categoria extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id_categoria';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'nombre';

	/**
	 * Act as Tree
	 */
	public $actsAs = array('Tree');

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id_categoria' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'parent_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lft' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rght' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Padre' => array(
			'className' => 'Categoria',
			'foreignKey' => 'parent_id'
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Hijos' => array(
			'className' => 'Categoria',
			'foreignKey' => 'parent_id',
			'dependent' => false
		),
		'Productos' => array(
			'className' => 'Producto',
			'foreignKey' => 'categoria_id',
			'dependent' => true
		)
	);

   /**
    * Function llamada para evitar que se eliminen categorías que todavía poseen productos asociados
    */
	public function beforeDelete( $cascade = true ) {
		$cant_prod = $this->Productos->find( 'count', array( 'conditions' => array( 'categoria_id' => $this->id ) ) );
		if( $cant_prod == 0 ) {
			return parent::beforeDelete( $cascade );
		} else {
			return false;
		}

	}

	public function tieneCategorias( $id_categoria = null ) {
		$cant_prod = $this->find( 'count', array( 'conditions' => array( 'Categoria.parent_id' => $id_categoria ) ) );
		if( $cant_prod != 0 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tieneProductos( $id_categoria = null ) {
		$cant_hijos = $this->Productos->find( 'count', array( 'conditions' => array( 'categoria_id' => $id_categoria ) ) );
		if( $cant_hijos != 0 ) {
			return true;
		} else {
			return false;
		}
	}

}
