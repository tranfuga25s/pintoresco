<?php

App::uses('AppController', 'Controller');

/**
 * Pintores Controller
 *
 */
class PintoresController extends AppController {

    /**
     * Modelo que se utliliza
     */
    public $uses = 'Pintor';

    /**
     * Función que habilita las funciónes públicas
     */
    public function beforeFilter() {
        $this->Auth->allow(array('index', 'view'));
        parent::beforeFilter();
    }

    /**
     * Muestra el listado de acciones permitidas
     */
    public function isAuthorized($usuario) {
        switch ($usuario['grupo_id']) {
            case 1: // SuperAdministradores
            case 2: // Administradores
                {
                    return true;
                    break;
                }
            case 3: // Publicadores
                {
                    switch ($this->request->params['action']) {
                        case 'administracion_index':
                        case 'administracion_add':
                        case 'administracion_edit':
                        case 'administracion_habilitar':
                        case 'administracion_deshabilitar': {
                                return true;
                                break;
                            }
                    }
                }
            case 4: // Pintores
                {
                    switch ($this->request->params['action']) {
                        case 'view': {
                                return true;
                                break;
                            }
                        default: {
                                return false;
                                break;
                            }
                    }
                    break;
                }
        }
        return false;
    }

    /**
     * Muestra la lista de pintores para los visitantes
     *
     * @author Esteban Zeller
     */
    public function index() {
        $this->set('pintores', $this->paginate( array( 'habilitado' => true ) ) );
    }

    /**
     * Muestra el perfil de un pintor
     *
     * @author Esteban Zeller
     */
    public function view($id_pintor = null) {
        $this->Pintor->id = $id_pintor;
        if (!$this->Pintor->exists()) {
            throw new NotFoundException('El pintor no existe');
        }

        $this->Pintor->id = $id_pintor;
        if ($this->Pintor->field('habilitado') == false) {
            throw new NotFoundException('El pintor no se encuentra habilitado para ser visto');
        }

        $this->Pintor->recursive = 2;
        $this->set('pintor', $this->Pintor->read(null, $id_pintor));
    }

    /**
     * Funcion para cambiar los datos del pintor o agregar obras
     *
     * @author Esteban Zeller
     */
    public function verPintor($id_pintor = null) {
        $this->Pintor->id = $id_pintor;
        if (!$this->Pintor->exists()) {
            throw new NotFoundException('El pintor seleccionado no existe');
        }
        $this->set('pintor', $this->Pintor->read(null, $id_pintor));
    }

    /**
     * Funcion por la cual los pintores pueden editar sus datos y cargar obras
     */
    public function edit($id_pintor = null) {
        $this->Pintor->id = $id_pintor;
        if (!$this->Pintor->exists()) {
            throw new NotFoundException('El pintor no existe!');
        }
        if ($this->request->isPost()) {
            if ($this->Pintor->saveAssociated($this->data)) {
                $this->Session->setFlash('Sus datos han sido actualizados correctamente', 'default', array('class' => 'sucess'));
            } else {
                $this->Session->setFlash('No se pudieron actualizar sus datos. Verifique los errores y corrigalos.', 'default', null, array('class' => 'error'));
            }
        }
        $this->set('especialidades', $this->Pintor->Especialidad->find('list'));
        $this->set('pintor', $this->Pintor->read(null, $id_pintor));
    }

    /**
     * Listado de pintores registrados en el sistema para la administración
     *
     * @author Esteban Zeller
     */
    public function administracion_index() {
        $this->set('pintores', $this->paginate());
    }

    /**
     * Agregar nuevo pintor directamente
     *
     * @author Esteban Zeller
     */
    public function administracion_add() {
        if ($this->request->isPost()) {
            if ($this->Pintor->saveAssociated($this->data)) {
                $this->Session->setFlash('El pintor se agregó correctamente', 'default', array('class' => 'sucess'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo agregar el pintor', 'default', array('class' => 'error'));
            }
        }
        $this->set('especialidades', $this->Pintor->Especialidad->find('list'));
    }

    public function administracion_edit($id_pintor = null) {
        $this->Pintor->id = $id_pintor;
        if (!$this->Pintor->exists()) {
            throw new NotFoundException('No se encontró el pintor');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Pintor->saveAssociated( $this->request->data ) ) {
                $this->Session->setFlash('El pintor ha sido guardado correctamente.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo guardar los datos del pintor.', 'default', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->Pintor->read(null, $id_pintor);
        }
        $this->set('especialidades', $this->Pintor->Especialidad->find('list'));
    }

    /**
     * Habilitar un pintor
     *
     * @author Esteban Zeller
     */
    public function administracion_habilitar($id_pintor = null) {
        $this->Pintor->id = $id_pintor;
        if (!$this->Pintor->exists()) {
            throw new NotFoundException('No se encontró el pintor');
        }
        if ($this->Pintor->saveField('habilitado', true)) {
            $this->Session->setFlash('El pintor ha sido habilitado correctamente.', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo habilitar el pintor.', 'default', array('class' => 'error'));
        }
    }

}
