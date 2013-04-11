<?php
App::uses('AppController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 */
class MarcasController extends AppController {

   /**
    * Authorización de métodos públicos
    */
	public function beforeFilter() {
		$this->Auth->allow( array( 'index', 'view', 'lista_simuladores' ) );
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
		$this->Marca->recursive = 0;
		return $this->Marca->find( 'all', array( 'conditions' => array( 'publicado' => true ) ) );
	}

	/**
	 * Metodo para ver los detalles de una marca
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		$this->set('marca', $this->Marca->read(null, $id));
	}

    /**
     * Metodo para listar los simuladores de cada marca
     * 
     * @return array lista de cmarcas y direccion de simuladores
     **/
    public function lista_simuladores() {
    $this->autoRender = false;
	return $this->Marca->listaSimuladores();
    }
	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Marca->recursive = 0;
		$this->set('marcas', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view( $id = null ) {
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		$this->set('marca', $this->Marca->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ( $this->request->is( 'post' ) ) {
			$this->Marca->create();
			if( $this->Marca->save( $this->request->data, true ) ) {
				$this->Session->setFlash( 'La marca ha sido agregada correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect( array( 'action' => 'index' ) );
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Marca->save($this->request->data)) {
				$this->Session->setFlash( 'La marca ha sido guardada correctamente.', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar la marca.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Marca->read(null, $id);
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		if( $this->Marca->tieneRelaciones( $id ) ) {
			$this->Session->setFlash( 'La marca tiene algún producto relacionado.', 'default', array( 'class' => 'error' ) );
			$this->redirect( array( 'controller' => 'productos', 'action' => 'index' ) );
		}
		if ($this->Marca->delete()) {
			$this->Session->setFlash( 'La marca ha sido eliminada correctamente', 'default', array( 'class' => 'success' ) );
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		if ($this->Marca->saveField( 'publicado', true ) ) {
			$this->Session->setFlash( 'La marca ha sido publicada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'La marca no se pudo publicar', 'default', array( 'class' => 'error' ) );
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException( 'Marca invalida' );
		}
		if ($this->Marca->saveField( 'publicado', false ) ) {
			$this->Session->setFlash( 'La marca ha sido despublicada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'La marca no se pudo despublicar', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}
}
