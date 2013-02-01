<?php
App::uses('AppController', 'Controller');
/**
 * Obras Controller
 *
 */
class ObrasController extends AppController {

	public $paginate = array();	
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
	 * Listado de pintores registrados en el sistema para la administración
	 */
	public function administracion_index() {
		$this->paginate['recursive'] = 2;
		$this->set( 'obras', $this->paginate() );
	}
	
	/**
	 * Agregar una nueva obra a un pintor
	 */
	 public function administracion_add() {
	 	if( $this->request->isPost() ) {
	 		$this->request->data['Obra']['fecha']['day'] = 01;
	 		if( $this->Obra->save( $this->request->data ) ) {
	 			$this->Session->setFlash( 'La obra fue agregada correctamente', null, 'default', array( 'class' => 'success' ) );
				$this->redirect( array( 'action' => 'index' ) );
	 		} else {
	 			$this->Session->setFlash( 'La obra no se pudo guardar', null, 'defualt', array( 'class' => 'error' ) );
	 		}
	 	}
		$this->set( 'pintors', $this->Obra->Pintor->lista() );
	 }
}
