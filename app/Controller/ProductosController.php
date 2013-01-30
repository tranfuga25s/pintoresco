<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 */
class ProductosController extends AppController {
	
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
		$this->Producto->recursive = 0;
		$this->set('productos', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		$this->set('producto', $this->Producto->read(null, $id));
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Producto->recursive = 0;
		$this->set('productos', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException( 'El producto especificado es invalido' );
		}
		$this->set('producto', $this->Producto->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Producto->create();
			if ($this->Producto->save($this->request->data)) {
				$this->Session->setFlash( 'El producto ha sido agregado correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El producto no pudo ser agregado. Intente nuevamente', 'default', array( 'class' => 'error' ) );
			}
		}
		$marcas = $this->Producto->Marca->find('list');
		$categorias = $this->Producto->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'marcas', 'categorias' ) );
	}

	/**
	 * administracion_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException( 'Producto especificado invalido' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Producto->save($this->request->data)) {
				$this->Session->setFlash( 'El producto ha sido guardado correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El producto no pudo ser guardado correctamente. Intente nuevamente.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Producto->read(null, $id);
		}
		$marcas = $this->Producto->Marca->find( 'list' );
		$categorias = $this->Producto->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'marcas', 'categorias' ) );
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
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException( 'Producto especificado invalido' );
		}
		if ($this->Producto->delete()) {
			$this->Session->setFlash( 'Producto eliminado correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'El producto no pudo ser eliminado', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}
}
