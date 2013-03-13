<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 */
class TiposController extends AppController {

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
		$this->Tipo->recursive = 0;
		$this->set('tipos', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
		$this->set('tipo', $this->Tipo->find('first', $options));
	}


	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Tipo->recursive = 0;
		$this->set('tipos', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
		$this->set('tipo', $this->Tipo->find('first', $options));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Tipo->create();
			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo could not be saved. Please, try again.'));
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
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
			$this->request->data = $this->Tipo->find('first', $options);
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
		$this->Tipo->id = $id;
		if (!$this->Tipo->exists()) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipo->delete()) {
			$this->Session->setFlash(__('Tipo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
