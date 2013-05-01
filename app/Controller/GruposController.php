<?php
App::uses('AppController', 'Controller');
/**
 * Grupos Controller
 *
 */
class GruposController extends AppController {

	public function isAuthorized( $usuario = null ) {
		switch( $usuario['grupo_id'] ) {
			case 1: // SuperAdministradores
			{
				return true;
				break;
			}
			case 2: // Administradores
			case 3: // Publicadores
			{
				switch( $this->request->params['action'] ) {
					case 'index':
					{ return true; break; }
				}
				// no pongo break para que acredite las acciones de menos prioridad
			}
		}
		return false;
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->paginate());
	}

	/**
	 * administracion_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->Grupo->id = $id;
		if (!$this->Grupo->exists()) {
			throw new NotFoundException( 'El grupo seleccionado no existe' );
		}
		$this->set('grupo', $this->Grupo->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Grupo->create();
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash( 'El grupo ha sido agregado correctamente.', 'default', array( 'class' => 'success' ) );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El grupo no ha podido ser guardado. Por favor, intente nuevamente.', 'default', array( 'class' => 'error' ) );
			}
		}
	}

	/**
	 * administracion_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		$this->Grupo->id = $id;
		if (!$this->Grupo->exists()) {
			throw new NotFoundException( 'Grupo invalido' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash( 'El grupo ha sido modificado correctamente', 'default', array( 'class' => 'success' ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'El grupo no pudo ser guardado correctamente', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Grupo->read(null, $id);
		}
	}

	/**
	 * administracion_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function administracion_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Grupo->id = $id;
		if (!$this->Grupo->exists()) {
			throw new NotFoundException( 'Grupo invalido' );
		}
		if ($this->Grupo->delete()) {
			$this->Session->setFlash( 'Grupo eliminado correctamente', 'default', array( 'class' => 'success' ) );
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash( 'El Grupo no pudo ser eliminado' );
		$this->redirect(array('action' => 'index'));
	}
}
