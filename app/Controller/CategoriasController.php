<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 */
class CategoriasController extends AppController {
	
	public $paginate = array();
	
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
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException( 'Categoria invalida' );
		}
		$this->set('categoria', $this->Categoria->read(null, $id));
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Categoria->recursive = 0;
		$this->paginate['Category'] = array(
        	'order' => array( 'Category.lft asc' )
		);
		$categorias = $this->paginate();
		foreach( $categorias as &$categoria )
			$categoria['Categoria']['nombre'] = implode( Set::classicExtract( $this->Categoria->getPath( $categoria['Categoria']['id_categoria'], 'nombre' ), '{n}.Categoria.nombre' ), ' > ' );
		$this->set( 'categorias', $categorias );
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException( 'Categoria Invalida' );
		}
		$this->set( 'categoria', $this->Categoria->read( null, $id ) );
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash( 'La Categoría has sido guardada', 'default', array( 'class' => 'success' ) );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'La categoria no pudo ser guardada correctamente. Intente nuevamente.', 'default', array( 'class' => 'error' ) );
			}
		}
		$padres = $this->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'padres' ) );
	}

	/**
	 * administracion_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException( 'Categoría Invalida' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('La Categoría has sido guardada', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La categoria no pudo ser guardada correctamente. Intente nuevamente.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Categoria->read(null, $id);
		}
		$padres = $this->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'padres' ) );
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
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException( 'Categoría Inválida' );
		}
		if( $this->Categoria->tieneCategorias( $id ) ) {
			$this->Session->setFlash( 'La categoria no pudo ser eliminada porque posee categorías hijas.', 'default', array( 'class' => 'error' ) );
		} else {
			if( $this->Categoria->tieneProductos( $id ) ) {
				$this->Session->setFlash( 'La categoria no pudo ser eliminada porque posee productos asociados a ella.', 'default', array( 'class' => 'error' ) );	
			} else {
				if ( $this->Categoria->delete() ) {
					$this->Session->setFlash( 'La categoría se eliminó correctamente', 'default', array( 'class' => 'success' ) );
					$this->redirect( array( 'action' => 'index' ) );
				}
			}
		}
		$this->redirect( array( 'action' => 'view', $id ) );
	}
}
