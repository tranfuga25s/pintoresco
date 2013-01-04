<?php
App::uses('AppController', 'Controller');
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
		$this->Auth->allow( array( 'index' ) );
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
					case 'index':
					case 'add':
					case 'edit':
					case 'delete':
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
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FotosObra->create();
			if ($this->FotosObra->save($this->request->data)) {
				$this->Session->setFlash(__('The fotos obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fotos obra could not be saved. Please, try again.'));
			}
		}
		$obras = $this->FotosObra->Obra->find('list');
		$this->set(compact('obras'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->FotosObra->id = $id;
		if (!$this->FotosObra->exists()) {
			throw new NotFoundException(__('Invalid fotos obra'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FotosObra->save($this->request->data)) {
				$this->Session->setFlash(__('The fotos obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fotos obra could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FotosObra->read(null, $id);
		}
		$obras = $this->FotosObra->Obra->find('list');
		$this->set(compact('obras'));
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FotosObra->id = $id;
		if (!$this->FotosObra->exists()) {
			throw new NotFoundException(__('Invalid fotos obra'));
		}
		if ($this->FotosObra->delete()) {
			$this->Session->setFlash(__('Fotos obra deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fotos obra was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index( $id_obra = null ) {
		if( $id_obra == null ) {
			throw new NotFoundException( 'Debe especificar la obra sobre la cual ver las imagenes' );
		}
		$this->FotosObra->recursive = 0;
		$this->set('fotosObras', $this->paginate( array( 'obra_id' => $id_obra ) ) );
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->FotosObra->id = $id;
		if (!$this->FotosObra->exists()) {
			throw new NotFoundException(__('Invalid fotos obra'));
		}
		$this->set('fotosObra', $this->FotosObra->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->FotosObra->create();
			if ($this->FotosObra->save($this->request->data)) {
				$this->Session->setFlash(__('The fotos obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fotos obra could not be saved. Please, try again.'));
			}
		}
		$obras = $this->FotosObra->Obra->find('list');
		$this->set(compact('obras'));
	}

	/**
	 * administracion_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		$this->FotosObra->id = $id;
		if (!$this->FotosObra->exists()) {
			throw new NotFoundException(__('Invalid fotos obra'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FotosObra->save($this->request->data)) {
				$this->Session->setFlash(__('The fotos obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fotos obra could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FotosObra->read(null, $id);
		}
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
	public function administracion_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FotosObra->id = $id;
		if (!$this->FotosObra->exists()) {
			throw new NotFoundException(__('Invalid fotos obra'));
		}
		if ($this->FotosObra->delete()) {
			$this->Session->setFlash(__('Fotos obra deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fotos obra was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
