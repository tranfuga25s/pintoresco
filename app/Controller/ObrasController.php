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
	public function administracion_index( $id_pintor = null ) {
		$this->paginate['recursive'] = 2;
        if( !is_null( $id_pintor ) ) {
            $this->paginate['conditions'] = array( 'pintor_id' => $id_pintor );
            $this->set( 'pintor', $this->Obra->Pintor->read( null, $id_pintor ) );
        }
		$this->set( 'obras', $this->paginate() );
	}

	/**
	 * Agregar una nueva obra a un pintor
	 */
	 public function administracion_add() {
	 	if( $this->request->isPost() ) {
	 		$this->request->data['Obra']['fecha']['day'] = 01;
            $id_pintor = $this->request->data['Obra']['pintor_id'];
	 		if( $this->Obra->save( $this->request->data ) ) {
	 			$this->Session->setFlash( 'La obra fue agregada correctamente', null, 'default', array( 'class' => 'success' ) );
				$this->redirect( array( 'action' => 'index', $id_pintor ) );
	 		} else {
	 			$this->Session->setFlash( 'La obra no se pudo guardar', null, 'default', array( 'class' => 'error' ) );
	 		}
	 	}
		$this->set( 'pintors', $this->Obra->Pintor->lista() );
	 }

    /**
     * Funcion para editar los datos de una obra
     * @param id_obra integer Identificador de la obra
     */
     public function administracion_edit( $id_obra = null, $id_pintor = null ) {
         if( $this->request->isPost() ) {
            if( $this->Obra->save( $this->request->data ) ) {
                $this->Session->setFlash( 'La obra se modificó correctamente', null, 'default', array( 'class' => 'success' ) );
                $this->redirect( array( 'action' => 'index', $id_pintor ) );
            } else {
                $this->Session->setFlash( 'La obra no se pudo modificar', null, 'default', array( 'class' => 'error' ) );
            }
         }
         $this->Obra->id = $id_obra;
         if( !$this->Obra->exists() ) {
            throw new NotFoundException( "La obra solicitada no existe" );
         }
         $this->request->data = $this->Obra->read();
         $this->set( 'pintors', $this->Obra->Pintor->lista() );
     }

     public function administracion_delete( $id_obra = null, $id_pintor = null ) {
         $this->Obra->id = $id_obra;
         if( !$this->Obra->exists() ) {
             throw new NotFoundException( "La obra solicitada no existe" );
         }
         if( $this->Obra->delete( $id_obra ) ) {
             $this->Session->setFlash( 'La obra se eliminó correctamente', null, 'default', array( 'class' => 'success' ) );
         } else {
             $this->Session->setFlash( 'No se pudo eliminar la obra', null, 'default', array( 'class' => 'error' ) );
         }
         $this->redirect( array( 'action' => 'index', $id_pintor ) );
     }

     public function administracion_publicar( $id_obra = null, $id_pintor = null ) {
         $this->Obra->id = $id_obra;
         if( !$this->Obra->exists() ) {
             throw new NotFoundException( "La obra solicitada no existe" );
         }
         if( $this->Obra->saveField( 'publicado', true ) ) {
             $this->Session->setFlash( 'La obra se publico correctamente', null, 'default', array( 'class' => 'success' ) );
         } else {
             $this->Session->setFlash( 'No se pudo publicar la obra', null, 'default', array( 'class' => 'error' ) );
         }
         $this->redirect( array( 'action' => 'index', $id_pintor ) );
     }

     public function administracion_despublicar( $id_obra = null, $id_pintor = null ) {
         $this->Obra->id = $id_obra;
         if( !$this->Obra->exists() ) {
             throw new NotFoundException( "La obra solicitada no existe" );
         }
         if( $this->Obra->saveField( 'publicado', false ) ) {
             $this->Session->setFlash( 'La obra se despublico correctamente', null, 'default', array( 'class' => 'success' ) );
         } else {
             $this->Session->setFlash( 'No se pudo despublicar la obra', null, 'default', array( 'class' => 'error' ) );
         }
         $this->redirect( array( 'action' => 'index', $id_pintor ) );
     }
}
