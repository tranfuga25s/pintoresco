<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

/**
 * FotosObras Controller
 *
 * @property FotosObra $FotosObra
 */
class FotosObrasController extends AppController {

    /**
     * Authorización de métodos públicos
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
                        case 'view':
                        case 'index':
                        case 'add':
                        case 'edit':
                        case 'delete': {
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
        $this->FotosObra->recursive = 0;
        $this->set('fotosObras', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->FotosObra->id = $id;
        if (!$this->FotosObra->exists()) {
            throw new NotFoundException(__('Invalid fotos obra'));
        }
        $this->set('fotosObra', $this->FotosObra->read(null, $id));
    }

    /**
     * administracion_index method
     *
     * @return void
     */
    public function administracion_index($id_obra = null) {
        if ($id_obra == null) {
            throw new NotFoundException('Debe especificar la obra sobre la cual ver las imagenes');
        }
        $this->FotosObra->recursive = 0;
        $this->set('fotosObras', $this->paginate(array('obra_id' => $id_obra)));
        $this->FotosObra->Obra->recursive = 2;
        $this->set('obra', $this->FotosObra->Obra->read(null, $id_obra));
    }

    /**
     * administracion_add method
     *
     * @return void
     */
    public function administracion_add() {
        if ($this->request->is('post')) {
            $this->FotosObra->create();
            if ($this->FotosObra->save($this->request->data, true)) {
                $this->Session->setFlash('La imagen ha sido agregada correctamente', 'default', null, array('class' => 'sucess'));
            } else {
                $this->Session->setFlash('La imagen no pudo ser enviada correctamente. Intente nuevamente.', 'default', null, array('class' => 'error'));
            }
            $this->redirect(array('action' => 'index', $this->data['FotosObra']['obra_id']));
        } else {
            // Si no pasó el ID lo mando a las obras
            $this->redirect(array('controller' => 'obras', 'action' => 'index'));
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
        if ($this->request->is('post') || $this->request->is('put')) {
            $id_obra = $this->request->data['FotosObra']['obra_id'];
            if ($this->FotosObra->save($this->request->data)) {
                $this->Session->setFlash('La imagen ha sido agregada correctamente', 'default', null, array('class' => 'sucess'));
                $this->redirect(array('action' => 'index', $this->request->data['FotosObra']['obra_id']));
            } else {
                $this->Session->setFlash('La imagen no pudo ser enviada correctamente. Intente nuevamente.', 'default', null, array('class' => 'error'));
            }
        }
        $this->FotosObra->id = $id;
        if (!$this->FotosObra->exists()) {
            throw new NotFoundException('Foto de obra invalida');
        }
        $this->request->data = $this->FotosObra->read(null, $id);
        $obras = $this->FotosObra->Obra->find('list');
        $this->set(compact('obras'));
    }

    /**
     * administracion_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function administracion_delete($id = null, $id_obra = null) {
        if ($id_obra == null) {
            throw new NotFoundException('Falta parametro');
        }
        $this->FotosObra->id = $id;
        if (!$this->FotosObra->exists()) {
            throw new NotFoundException('La fotografia indicada es inválida');
        }
        if ($this->FotosObra->delete()) {
            $this->Session->setFlash('La foto pudo ser eliminada correctamente', 'default', null, array('class' => 'sucess'));
            $this->redirect(array('action' => 'index', $id_obra));
        }
        $this->Session->setFlash('La fotografía no pudo ser eliminada', 'default', null, array('class' => 'error'));
        $this->redirect(array('action' => 'index', $id_obra));
    }

}
