<?php
App::uses('AppController', 'Controller');
/**
 * Pintores Controller
 *
 */
class PintoresController extends AppController {

	/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public $scaffold;
	
	public $uses = 'Pintor';
	
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
	
	/**
	 * Listado de pintores registrados en el sistema para la administración
	 */
	public function administracion_index() {
		$this->set( 'pintores', $this->paginate() );
	}
	
	/**
	 * Agregar nuevo pintor directamente
	 */
	 public function administracion_add() {
	 	if( $this->request->isPost() ) {
	 		
	 	}
		$this->set( 'especialidades', $this->Pintor->Especialidad->find('list') );
	 }
}
