<?php
App::uses('AppController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 */
class MaterialesController extends AppController {

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
	 * Muestra el listado de marcas disponibles en la pintoreria
	 *
	 * @return void
	 */
	public function index() {
		$this->Material->recursive = 0;
		return $this->Material->find( 'all', array( 'conditions' => array( 'publicado' => true ) ) );
	}

	/**
	 * Metodo para ver los detalles de una marca
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalida' );
		}
		$this->set('material', $this->Material->read(null, $id));
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Material->recursive = 0;
		$this->set('materiales', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view( $id = null ) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalido' );
		}
		$this->set('material', $this->Material->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Material->create();
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash( 'El material ha sido agregada correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'La marca no pudo ser guardad.', 'default', array( 'class' => 'error' ) );
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
	public function administracion_edit( $id = null ) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalido' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash( 'El material ha sido guardada correctamente.', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar el material.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Material->read(null, $id);
		}
	}

	/**
	 * administracion_delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_delete( $id = null ) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalido' );
		}
		if ($this->Material->delete()) {
			$this->Session->setFlash( 'El material ha sido eliminado correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'La marca no se pudo eliminar', 'default', array( 'class' => 'error' ) );
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * administracion_publicar method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_publicar( $id = null ) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalido' );
		}
		if ($this->Material->saveField( 'publicado', true ) ) {
			$this->Session->setFlash( 'El material ha sido publicada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'El material no se pudo publicar', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}
	
	/**
	 * administracion_despublicar method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_despublicar( $id = null ) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException( 'Material invalida' );
		}
		if ($this->Material->saveField( 'publicado', false ) ) {
			$this->Session->setFlash( 'El material ha sido despublicada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'El material no se pudo despublicar', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}
}
