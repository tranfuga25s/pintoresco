<?php

App::uses('AppModel', 'Model');

/**
 * Convenio Model
 *
 * @property Organismo $Organismo
 */
class Convenio extends AppModel {
    
    public $useTable = 'convenio';

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'id_convenio';

    /**
     * Campo a mostrar
     * @var string  
     */
    public $displayField = 'titulo';

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Organismo' => array(
            'className' => 'Organismo',
            'foreignKey' => 'organismo_id'
        )
    );

    /**
     * 
     */
    public function mostrarFrontend() {
        return $this->find('all', array('conditions' => array('`Convenio`.`publicado`' => true/* , 'DATE( `Convenio`.`fecha_fin` ) <= DATE( NOW() )', 'fecha_inicio >= NOW()' */),
                    'fields' => array('id_convenio', 'titulo', 'descuento', 'destino'),
                    'order' => array('fecha_inicio ASC'),
                    'limit' => 4));
    }

}
