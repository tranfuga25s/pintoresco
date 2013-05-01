<?php
App::uses('AppController', 'Controller');
/**
 * Organismos Controller
 *
 * @property Organismo $Organismo
 */
class OrganismosController extends AppController {

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
		$this->Organismo->recursive = 0;
		$this->set('organismos', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Organismo->id = $id;
		if (!$this->Organismo->exists()) {
			throw new NotFoundException( 'Organismo iválido');
		}
		$this->set('organismo', $this->Organismo->read(null, $id));
	}


	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Organismo->recursive = 0;
		$this->set('organismos', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->Organismo->id = $id;
		if (!$this->Organismo->exists()) {
			throw new NotFoundException( 'Organismo no encontrado' );
		}
		$this->set('organismo', $this->Organismo->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Organismo->create();
			if ($this->Organismo->save($this->request->data)) {
				$this->Session->setFlash( 'Organismo agregado correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar correctamente el organismo.', 'default', array( 'class' => 'error' ) );
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
		$this->Organismo->id = $id;
		if (!$this->Organismo->exists()) {
			throw new NotFoundException(__('Invalid organismo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organismo->save($this->request->data)) {
				$this->Session->setFlash( 'El organismo se guardó correctamente', 'default', array( 'class' => 'success' ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar correctamente el organismo', 'default', array( 'class' => 'error' ));
			}
		} else {
			$this->request->data = $this->Organismo->read(null, $id);
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
	public function administracion_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Organismo->id = $id;
		if (!$this->Organismo->exists()) {
			throw new NotFoundException( 'No se encontró el organismo buscado' );
		}
		if ($this->Organismo->delete()) {
			$this->Session->setFlash( 'Se ha eliminado correctamente el organismo' , 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'El organismo no pudo ser eliminado. Verifique que no tenga convenios asociados.', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'view', $id ) );
	}
}
