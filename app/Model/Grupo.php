<?php

App::uses('AppModel', 'Model');

/**
 * Grupo Model
 *
 * @property Usuario $Usuario
 */
class Grupo extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'id_grupo';

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
        'id_grupo' => array(
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
                'message' => 'Ingrese un nombre para el grupo',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'grupo_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    /**
     * Evita que se eliminen grupos con usuarios en el grupo y el grupo administrador
     * @param type $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        $count = $this->Usuario->find('count', array(
            'conditions' => array( 'grupo_id' => $this->id )
        ));
        if ($count > 0) {
            return false;
        } else if ($this->id == 1 ) {
            return false;
        }        
        return true;
    }

}
