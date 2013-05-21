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
		$this->Producto->recursive = 1;
		if( $this->request->isGet() && isset( $this->request->query['nombre'] ) ) {
			$cond = array();
			$cond['`Producto`.`publicado`'] = true;
			if( $this->request->query['nombre'] != '' ) {
				$cond["OR"] = array(
					"`Producto`.`nombre` LIKE '%".$this->request->query['nombre']."%'",
					"`Producto`.`descripcion` LIKE '%".$this->request->query['nombre']."%'",
					"`Producto`.`colores` LIKE '%".$this->request->query['nombre']."%'"
				);
			}
			if( $this->request->query['marca_id'] != '' ) {
				$cond['`Producto`.`marca_id`'] = $this->request->query['marca_id'];
			}
			if( $this->request->query['tipo_id'] != '' ) {
				$cond['`Producto`.`tipo_id`'] = $this->request->query['tipo_id'];
			}
			if( $this->request->query['superficie_id'] != '' ) {
				$this->Producto->bindModel( array( 'hasOne' => array( 'ProductosSuperficies' ) ), false );
                $cond['`ProductosSuperficies`.`superficie_id`'] = $this->request->query['superficie_id'];
			}
            $this->pagination = array( 'conditions' => $cond, 'recursive' => 1 );
			$this->set( 'productos', $this->paginate( $cond ) );
			$this->set( 'nombre', $this->request->query['nombre'] );
			$this->set( 'marca_id', $this->request->query['marca_id'] );
			$this->set( 'tipo_id', $this->request->query['tipo_id'] );
			$this->set( 'superficie_id', $this->request->query['superficie_id'] );
		} else {
			$this->set( 'productos', $this->paginate( array( '`Producto`.`publicado`' => true )) );
			$this->set( 'nombre', '' );
			$this->set( 'marca_id', '' );
			$this->set( 'tipo_id', '' );
			$this->set( 'superficie_id', '' );
		}
		$this->set( 'marcas', $this->Producto->Marca->find('list') );
		$this->set( 'tipos', $this->Producto->Tipo->find('list') );
		$this->set( 'superficies', $this->Producto->Superficie->find('list') );
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
			if ($this->Producto->saveAssociated($this->request->data)) {
				$this->Session->setFlash( 'El producto ha sido agregado correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El producto no pudo ser agregado. Intente nuevamente', 'default', array( 'class' => 'error' ) );
			}
		}
		$marcas = $this->Producto->Marca->find('list');
		$tipos = $this->Producto->Tipo->find('list');
		$superficies = $this->Producto->Superficie->find('list');
		$materiales = $this->Producto->Material->find( 'list' );
		$categorias = $this->Producto->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'marcas', 'categorias', 'materiales', 'tipos', 'superficies' ) );
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
			if ($this->Producto->saveAssociated( $this->request->data ) ) {
				$this->Session->setFlash( 'El producto ha sido guardado correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El producto no pudo ser guardado correctamente. Intente nuevamente.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Producto->read(null, $id);
		}
		$marcas = $this->Producto->Marca->find( 'list' );
		$materiales = $this->Producto->Material->find( 'list' );
        $superficies = $this->Producto->Superficie->find('list');
		$tipos = $this->Producto->Tipo->find('list');
		$categorias = $this->Producto->Categoria->generateTreeList( null, null, null, ' > ' );
		$this->set( compact( 'marcas', 'categorias', 'materiales', 'tipos', 'superficies' ) );
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

   /**
    * administracion_desvincular
    * Accion llamada para sacar la vinculación entre un producto y un material
    */
    public function administracion_desvincular() {
    	debug( $this->request->params['named'] );
		$id_material = $this->request->params['named']['material'];
		$id_producto = $this->request->params['named']['producto'];
		$this->Producto->id = $id_producto;
		if( !$this->Producto->exists() ) {
			throw new NotFoundException( 'El producto elegido no existe' );
		}
		$this->Producto->Material->id = $id_material;
		if( !$this->Producto->Material->exists() ) {
			throw new NotFoundException( 'El material no existe' );
		}

		$ret = $this->Producto->query( "DELETE FROM `productos_materiales` WHERE `producto_id` =  ".$id_producto." AND `material_id` = ".$id_material.";" );
		if( count( $ret ) == 0 ) {
			$this->Session->setFlash( 'La asociación pudo ser eliminada correctamente', 'default', array( 'class' => 'success' ) );
		} else {
			$this->Session->setFlash( 'No se pudo eliminar la asociación', 'default', array( 'class' => 'error' ) );
		}
		$this->redirect( array( 'action' => 'view', $id_producto ) );
    }

}
