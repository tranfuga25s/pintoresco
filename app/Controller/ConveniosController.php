<?php

App::uses('AppController', 'Controller');

/**
 * Convenios Controller
 *
 * @property Convenio $Convenio
 */
class ConveniosController extends AppController {

    /**
     * Funciones publicas
     */
    public function beforeFilter() {
        $this->Auth->allow(array('index', 'view', 'frontend'));
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
     * frontend method
     * 
     * @return list of the nº primeros convenios
     */
    public function frontend() {
        $this->autoRender = false;
        return $this->Convenio->mostrarFrontend();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Convenio->recursive = 0;
        $this->set('convenios', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Convenio->id = $id;
        if (!$this->Convenio->exists()) {
            throw new NotFoundException(__('Invalid convenio'));
        }
        $this->set('convenio', $this->Convenio->read(null, $id));
    }

    /**
     * administracion_index method
     *
     * @return void
     */
    public function administracion_index() {
        $this->Convenio->recursive = 0;
        $this->set('convenios', $this->paginate());
    }

    /**
     * administracion_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_view($id = null) {
        $this->Convenio->id = $id;
        if (!$this->Convenio->exists()) {
            throw new NotFoundException('Convenio no encontrado');
        }
        $this->set('convenio', $this->Convenio->read(null, $id));
    }

    /**
     * administracion_add method
     *
     * @return void
     */
    public function administracion_add() {
        if ($this->request->is('post')) {
            $this->Convenio->create();
            if ($this->Convenio->save($this->request->data)) {
                $this->Session->setFlash('Convenio agregado correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('El convenio no pudo ser guardado correctamente', 'default', array('class' => 'error'));
            }
        }
        $this->set('organismos', $this->Convenio->Organismo->find('list'));
    }

    /**
     * administracion_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_edit($id = null) {
        $this->Convenio->id = $id;
        if (!$this->Convenio->exists()) {
            throw new NotFoundException('Convenio no encontrado');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Convenio->save($this->request->data)) {
                $this->Session->setFlash('El convenio fue guardado correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('El convenio no pudo ser guardado', 'default', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->Convenio->read(null, $id);
        }
        $this->set('organismos', $this->Convenio->Organismo->find('list'));
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
        $this->Convenio->id = $id;
        if (!$this->Convenio->exists()) {
            throw new NotFoundException('El convenio buscado no se encontro');
        }
        if ($this->Convenio->delete()) {
            $this->Session->setFlash('Convenio eliminado', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('El convenio no pudo ser eliminado', 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
