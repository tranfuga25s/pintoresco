<?php
App::uses('AppController', 'Controller');
/**
 * Superficies Controller
 *
 * @property Superficie $Superficie
 */
class SuperficiesController extends AppController {

   /**
    * Authorización de métodos públicos
    */
    public function beforeFilter() {
        $this->Auth->allow( array( 'index', 'view' ) );
        parent::beforeFilter();
    }

    /**
     * Muestra el listado de acciones permitidas
     */
    public function isAuthorized( $usuario ) {
        switch( $usuario['grupo_id'] ) {
            case 1: // SuperAdministradores
            case 2: // Administradores
            {
                return true;
                break;
            }
            case 3: // Publicadores
            {
                switch( $this->request->params['action'] ) {
                    case 'administracion_index':
                    case 'administracion_add':
                    case 'administracion_edit':
                    case 'administracion_publicar':
                    case 'administracion_despublicar':
                    { return true; break; }
                }
            }
            case 4: // Pintores
            {
                switch( $this->request->params['action'] ) {
                    case 'view':
                    { return true; break; }
                    default:
                    { return false; break; }
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
		$this->Superficie->recursive = 0;
		$this->set('superficies', $this->paginate( array( 'publicado' => true ) ) );
	}

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function view($id = null) {
		if (!$this->Superficie->exists($id)) {
			throw new NotFoundException( 'Superficie invalida' );
		}
        $this->Superficie->id = $id;
        if( $this->Superficie->field('publicado') == false ) {
            throw new NotFoundException( 'Superficie no publicado' );
        }
		$options = array( 'conditions' => array( 'Superficie.' . $this->Superficie->primaryKey => $id ) );
		$this->set( 'superficie', $this->Superficie->find( 'first', $options ) );
	}

    /**
     * administracion_index method
     *
     * @return void
     */
	public function administracion_index() {
		$this->Superficie->recursive = 0;
		$this->set('superficies', $this->paginate());
	}

    /**
     * administracion_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function administracion_view($id = null) {
		if (!$this->Superficie->exists($id)) {
			throw new NotFoundException(__('Invalid superficie'));
		}
		$options = array('conditions' => array('Superficie.' . $this->Superficie->primaryKey => $id));
		$this->set('superficie', $this->Superficie->find('first', $options));
	}

    /**
     * administracion_add method
     *
     * @return void
     */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Superficie->create();
			if ($this->Superficie->save($this->request->data)) {
				$this->Session->setFlash( 'La superficie fue agregada correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo agregar la superficie.', 'default', array( 'class' => 'error' ) );
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
		if (!$this->Superficie->exists($id)) {
			throw new NotFoundException( 'Superficie Invalida'   );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Superficie->save($this->request->data)) {
				$this->Session->setFlash( 'La superficie a sido modificada correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar la superficie. Intente nuevamente', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$options = array('conditions' => array('Superficie.' . $this->Superficie->primaryKey => $id));
			$this->request->data = $this->Superficie->find('first', $options);
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
		$this->Superficie->id = $id;
		if (!$this->Superficie->exists()) {
			throw new NotFoundException( 'Superficie Invalida' );
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Superficie->delete()) {
			$this->Session->setFlash( 'La superficie fue eliminada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'La superficie no pudo ser eliminada', 'default', array( 'class' => 'error' ) );
		$this->redirect(array('action' => 'index'));
	}
}
