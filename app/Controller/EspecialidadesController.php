<?php
App::uses('AppController', 'Controller');
/**
 * Especialidades Controller
 *
 */
class EspecialidadesController extends AppController {

	/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public $scaffold;
	
	public $uses = 'Especialidad';
	
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
					case 'administracion_habilitar':
					case 'administracion_deshabilitar':
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
	
	public function administracion_index() {
		$this->set( 'especialidades', $this->paginate() );
	}
	
	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Especialidad->create();
			if ($this->Especialidad->save($this->request->data)) {
				$this->Session->setFlash( 'La especialidad ha sido agregada correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'La especialidad no pudo ser guardad.', 'default', array( 'class' => 'error' ) );
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
		$this->Especialidad->id = $id;
		if (!$this->Especialidad->exists()) {
			throw new NotFoundException( 'Especialidad invalida' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Especialidad->save($this->request->data)) {
				$this->Session->setFlash( 'La especialidad ha sido guardada correctamente.', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'No se pudo guardar la especialidad.', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Especialidad->read(null, $id);
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
		$this->Especialidad->id = $id;
		if (!$this->Especialidad->exists()) {
			throw new NotFoundException( 'Especialidad invalida' );
		}
		if ($this->Especialidad->delete()) {
			$this->Session->setFlash( 'La Especialidad ha sido eliminada correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'La Especialidad no se pudo eliminar', 'default', array( 'class' => 'error' ) );
		$this->redirect(array('action' => 'index'));
	}
}
