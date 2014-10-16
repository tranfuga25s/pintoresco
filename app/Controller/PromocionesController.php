<?php

App::uses('AppController', 'Controller');

/**
 * Promocions Controller
 *
 * @property Promocion $Promocion
 */
class PromocionesController extends AppController {

    public $uses = 'Promocion';

    /**
     * Authorización de métodos públicos
     */
    public function beforeFilter() {
        $this->Auth->allow(array('index', 'view', 'home'));
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
                        case 'administracion_publicar':
                        case 'administracion_despublicar': {
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
     * home method
     * 
     * @return Array 
     */
    public function home() {
        return $this->Promocion->homePage();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Promocion->recursive = 0;
        $this->set('promociones', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Promocion->id = $id;
        if (!$this->Promocion->exists()) {
            throw new NotFoundException('La promoción No existe!');
        }
        $this->set('promocion', $this->Promocion->read(null, $id));
    }

    /**
     * administracion_index method
     *
     * @return void
     */
    public function administracion_index() {
        $this->Promocion->recursive = 0;
        $this->set('promociones', $this->paginate());
    }

    /**
     * administracion_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_view($id = null) {
        $this->Promocion->id = $id;
        if (!$this->Promocion->exists()) {
            throw new NotFoundException('La promoción no existe ');
        }
        $this->set('promocion', $this->Promocion->read(null, $id));
    }

    /**
     * administracion_add method
     *
     * @return void
     */
    public function administracion_add() {
        if ($this->request->is('post')) {
            $this->Promocion->create();
            if ($this->Promocion->save($this->request->data)) {
                $this->Session->setFlash('La promoción ha sido guardada correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo agregar la promocion', 'default', array('class' => 'error'));
            }
        }
    }

    /**
     * administracion_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_edit($id = null) {
        $this->Promocion->id = $id;
        if (!$this->Promocion->exists()) {
            throw new NotFoundException(__('Invalid promocion'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Promocion->save($this->request->data)) {
                $this->Session->setFlash('La promoción ha sido guardada correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo guardar la promocion', 'default', array('class' => 'error'));
            }
        }
        $this->request->data = $this->Promocion->read(null, $id);
    }

    /**
     * administracion_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Promocion->id = $id;
        if (!$this->Promocion->exists()) {
            throw new NotFoundException(__('Invalid promocion'));
        }
        if ($this->Promocion->delete()) {
            $this->Session->setFlash('La promoción ha sido eliminada correctamente', 'default', array('class' => 'sucess'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('La promoción no pudo ser eliminada', 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
