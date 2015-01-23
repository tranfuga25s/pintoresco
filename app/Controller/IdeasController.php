<?php

App::uses('AppController', 'Controller');

/**
 * Ideas Controller
 *
 * @property Idea $Idea
 */
class IdeasController extends AppController {

    /**
     * Paginas publicas
     */
    public function beforeFilter() {
        $this->Auth->allow(array('index'));
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
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Idea->recursive = 0;
        $this->set('ideas', $this->paginate());
    }

    /**
     * administracion_index method
     *
     * @return void
     */
    public function administracion_index() {
        $this->Idea->recursive = 0;
        $this->set('ideas', $this->paginate());
    }

    /**
     * administracion_add method
     *
     * @return void
     */
    public function administracion_add() {
        if ($this->request->is('post')) {
            $this->Idea->create();
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash('La idea ha sido agregada correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo agregar la idea', 'default', array('class' => 'error'));
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
        if (!$this->Idea->exists($id)) {
            throw new NotFoundException('La idea no es valida');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash('La idea ha sido guardada correctamente', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('La idea no se pudo editar', 'default', array('class' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Idea.' . $this->Idea->primaryKey => $id));
            $this->request->data = $this->Idea->find('first', $options);
        }
    }

    /**
     * administracion_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function administracion_delete($id = null) {
        $this->Idea->id = $id;
        if (!$this->Idea->exists()) {
            throw new NotFoundException('Idea invalida');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Idea->delete()) {
            $this->Session->setFlash('Idea eliminada correctamente', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('La idea no se pudo eliminar', 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
