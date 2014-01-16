<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Usuarios Controller
 *
 */
class UsuariosController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow( array( 	'ingresar',
						'administracion_ingresar',
						'administracion_salir',
						'salir',
						'recuperarContra',
						'registrarse',
						'cancelar',
						'eliminarUsuario' ) );
		parent::beforeFilter();
	}

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
					case 'add':
					case 'delete':
					{ return true; break; }
				}
				// no pongo break para que acredite las acciones de menos prioridad
			}
			case 4: // Pintores
			{
				switch( $this->request->params['action'] ) {
					case 'view':
					case 'edit':
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
	 * Metodo de login de usuario para la pagina
	 *
	 * @return void
	 */
	public function ingresar() {
		if ($this->request->is('post')) {
			if ( $this->Auth->login() ) {
				return $this->redirect( array( 'controller' => 'pages', 'action' => 'display', 'home' ) );
			} else {
				$this->Session->setFlash( "El email ingresado o la contraseña son incorrectas", 'default', array( 'class' => 'error' ), 'auth');
			}
		}
	}

	/*!
	 *  Metodo de logout de usuario
	 *
	 * @return void
	 */
	public function salir() {
		$this->redirect( $this->Auth->logout() );
	}


	/*!
	 *  Metodo de login de usuario para la administracion
	 *
	 * @return void
	 */
	public function administracion_ingresar() {
		$this->layout='adminlogin';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect( '/administracion/usuarios/cpanel' );
			} else {
				//echo AuthComponent::password( $this->data['Usuario']['contra'] );
				$this->Session->setFlash( 'El email ingresado o la contraseña son incorrectas', 'default', array( 'class' => 'error' ), 'auth');
			}
		}
	}

	/**
	 * Metodo de salir de login de usuario para la administracion
	 *
	 * @return void
	 */
	public function administracion_salir() {
		$this->redirect( $this->Auth->logout() );
	}

	/**
	 * Metodo recuperar la contraseña
	 *
	 * @return void
	 */
	public function recuperarContra() {
		if( $this->request->isPost() ) {
			if( !empty( $this->data['Recuperar']['email'] ) ) {
				if( !$this->Usuario->verificarSiExiste( $this->data['Recuperar']['email'] ) ) {
					$this->Session->setFlash( 'La casilla de email ingresada no existe en nuestro sistema. Por favor, registrese en nuestro sitio.', 'default', array( 'class' => 'error' ) );
				} else {
					$nueva_contra = $this->Usuario->generarNuevaContraseñarray( $this->data['Recuperar']['email'] );
					if( $nueva_contra != false ) {
						// Envio el email explicandolo
                        $de = Configure::read( 'Configuracion.email_contacto' );
						if( is_array( $de ) ) { $de = $de[0]; }
						$email = new CakeEmail();
						$email->template( 'recuperaContra', 'usuario' );
						$email->emailFormat( 'both' );
						$email->to( $this->data['Recuperar']['email'] );
						$email->viewVars( array( 'email' => $this->data['Recuperar']['email'], 'contra' => $nueva_contra ) );
						$email->subject( 'Su nueva contraseña' );
						$email->from( $de );
						$email->send();
						if( $this->Auth->loggedIn() ) {
							$this->Session->setFlash( 'Se envió una nueva contraseña de ingreso al usuario', 'default', array( 'class' => 'sucess' )  );
							$this->redirect( array( 'action' => 'index', 'administracion' => true ) );
						} else {
							$this->Session->setFlash( 'Se ha enviado un mensaje con su nueva contraseña.<br />Por favor, revise su casilla de correo para obtener los datos y así poder ingresar al sistema.', 'default', array( 'class' => 'sucess' ) );
							$this->redirect( array( 'action' => 'ingresar' ) );
						}
					} else {
						$this->Session->setFlash( 'No se pudo generar una nueva contraseña.', 'default', array( 'class' => 'error' ) );
					}
				}
			} else {
				$this->Session->setFlash( 'Por favor, ingrese una dirección de correo electronico para solicitar su nueva contraseña.', 'default', array( 'class' => 'error' ) );
			}
		}
		$this->set( 'dominio', $_SERVER['SERVER_NAME'] );
	}

	/**
	 * Metodo para mostrar el formulario de registración y agregar nuevos usuarios
	 *
	 */
	public function registrarse() {
		if ( $this->request->is('post') ) {
			// Verifico que las contraseñas coincidan
			if( empty( $this->request->data['Usuario']['contra'] ) || empty( $this->request->data['Usuario']['contrarep'] ) ) {
				$this->Session->setFlash( 'Por favor, ingrese una contraseña' );
			} else {
				if( $this->request->data['Usuario']['contra'] != $this->request->data['Usuario']['contrarep'] ) {
					$this->Session->setFlash( 'Las contraseñas no coinciden' , 'default', array( 'class' => 'error' ) );
				} else {
					// Busco si el email no existe ya
					if( $this->Usuario->verificarSiExiste( $this->request->data['Usuario']['email'] ) ) {
						$this->Session->setFlash( "Ya existe una cuenta con este usuario y contraseña.<br \> Recupere su contraseña para usarla" , 'default', array( 'class' => 'error' ) );
						$this->redirect( array( 'action' => 'recuperarContra' ) );
					}
					$this->Usuario->create();
					if ( $this->Usuario->save( $this->request->data ) ) {
						$id = $this->Usuario->id;
						$this->request->data['Usuario'] = array_merge( $this->request->data['Usuario'], array( 'id' => $id ) );
						if( $this->Auth->login() ) {
							$this->borrarCacheUsuarios();
							$this->Session->setFlash( "Bienvenido! - Su usuario ha sido creado correctamente.", 'default', array( 'class' => 'sucess' ) );
							$de = Configure::read( 'Turnera.email_notificaciones' );
							if( empty( $de )  ) { $de = 'info@alejandrotalin.com.ar'; }
							// Crear email de bienvenida!
							$email = new CakeEmail();
							$email->template( 'bienvenida', 'usuario' )
							->emailFormat( 'both' )
							->from( $de )
							->to( $this->request->data['Usuario']['email'] )
							->viewVars( array( 'usuario' => $this->data['Usuario'] ) )
							->subject( 'Bienvenido al sistema de turnos' )
							->send();
							// Hago que el usuario se logee directamente
							$this->redirect( array( 'controller' => 'turnos', 'action' => 'nuevo' ) );
						} else {
							$this->Session->setFlash( "Bienvenido! - Su usuario ha sido creado correctamente.<br />Por favor, ingrese con sus datos recien creados para utilizar el sistema." , 'default', array( 'class' => 'sucess' ) );
							$this->redirect( '/' );
						}
					} else {
						$this->Session->setFlash( 'El Usuario no pude ser guardado. Por favor, intente nuevamente.', 'default', array( 'class' => 'error' ) );
					}
				}
			}
		}
		$this->set( 'grupos', $this->Usuario->Grupo->find( 'list' ) );
		$this->set( 'dominio', $_SERVER['SERVER_NAME'] );
	}

   /*!
    * Funcion llamada cuando un usuario desea dar de baja su cuenta.
    */
	public function eliminarUsuario()
	{
		if( $this->request->isPost() ) {
			if( empty( $this->data['Usuario']['email'] ) ) {
				$this->Session->setFlash( 'El correo electronico no puede estar vacío' );
			} else {
				if( ! $this->Usuario->verificarSiExiste( $this->data['Usuario']['email'] ) ) {
					$this->Session->setFlash( 'El correo electronico ingresado no pertenece a ningún usuario registrado' , 'default', array( 'class' => 'error' ) );
				} else {
					// Elimino los turnos que tenga asociados
					if( $this->Usuario->delete( $id ) ) {
						$this->log( 'Usuario de id='.$id.' fue dado de baja' );
						$this->log( 'Razon de baja:'.$this->data['Usuario']['razon'] );
						$this->Session->setFlash( 'El usuario fue dado de baja correctamente.<br />Gracias por haber utilizado nuestros servicios!', 'default', array( 'class' => 'sucess' ) );
						$this->redirect( '/' );
					} else {
						$this->Session->setFlash( 'Existió un error al dar de baja el usuario', 'default', array( 'class' => 'error' ) );
					}
				}
			}
		}
	}


	/**
	 * Meotodo para que el usuario pueda ver sus datos
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if( $id == null ) {
			$id = $this->Auth->user( 'id_usuario' );
		}
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'El usuario no es valido' );
		}
		$this->set( 'usuario', $this->Usuario->read( null, $id ) );
	}

	/**
	 * Metodo para que un usuario pueda modificar sus datos
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'El usuario no es válido' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash( 'Sus datos fueron modificados correctamente' , 'default', array( 'class' => 'sucess' ) );
				$this->redirect( array( 'action' => 'view' ) );
			} else {
				$this->Session->setFlash( 'Los datos no pudieron ser guardados. Intente nuevamente', 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Usuario->read (null, $id );
			$this->set( 'grupos', $this->Usuario->Grupo->find( 'list' ) );
			$this->set( 'obras_sociales', $this->Usuario->ObraSocial->find( 'list' ) );
		}
	}

	/**
	 * Metodo para darse de baja como usuario. Punto importante.
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'El usuario no es valido' );
		}
		throw new NotFoundException( 'La eliminación de usuarios todavía no está terminada' );
		/*
		// Veo si si es un medico
		$this->loadModel( 'Medico' );
		if( $this->Medico->find( 'count', array( 'conditions' => array( 'usuario_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. \n <b>Razon:</b> El usuario tiene un medico asociado" );
			$this->redirect( array( 'action' => 'index' ) );
		}
		// Veo si es una secretaria
		$this->loadModel( 'Secretaria' );
		if( $this->Secretaria->find( 'count', array( 'conditions' => array( 'usuario_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. <br /><b>Razon:</b> El usuario tiene una secretaria asociada" );
			$this->redirect( array( 'action' => 'index' ) );
		}
		// Verifico si tiene alguna relación con Turnos.
		$this->loadModel( 'Turno' );
		if( $this->Turno->find( 'count', array( 'conditions' => array( 'paciente_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. <br /><b>Razon:</b> El usuario tiene turnos asociados todavía." );
			$this->redirect( array( 'action' => 'index'  ) );
		} */
		if( $this->Usuario->delete() ) {
			$this->borrarCacheUsuarios();
			$this->Session->setFlash( 'El Usuario ha sido eliminado correctamente', 'default', array( 'class' => 'sucess' ) );
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash( 'El Usuario no fue eliminado', 'default', array( 'class' => 'error' ) );
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * Metodo para mostrar el panel de control de la administración
	 * @return void
	 */
	public function administracion_cpanel() {}

	/**
	 * Listado de usuarios de la administración.
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Usuario->recursive = 0;
		$this->set( 'usuarios', $this->paginate() );
	}

	/**
	 * administracion_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function administracion_view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'Usuario invalido' );
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash( 'El usuario se agregó correctamente', 'default', array( 'class' => 'sucess' ) );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Los datos del usuario no se pudieron guardar. Por favor, intentelo nuevamente.', 'default', null, array( 'class' => 'error' ) );

			}
		}
		$this->set( 'grupos', $this->Usuario->Grupo->find( 'list' ) );
	}

	/**
	 * administracion_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'Usuario invalido' );
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash( 'Los datos del usuario se modificaron correctamente', 'default', array( 'class' => 'success' ) );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Los datos del usuario no pudieron ser guardados correctamente. Por favor intente nuevamente.' , 'default', array( 'class' => 'error' ) );
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
			$this->set( 'grupos', $this->Usuario->Grupo->find( 'list' ) );
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'El usuario no es valido' );
		}
		throw new NotFoundException( 'La verificación de relaciónes entre usuarios y pintor todavía no ha sido programada. Despublique el pintor' );
		/*$this->loadModel( 'Turno' );
		if( $this->Turno->find( 'count', array( 'conditions' => array( 'paciente_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. \n <b>Razon:</b> El usuario tiene turnos asociados todavía." );
			$this->redirect( array( 'action' => 'index'  ) );
		}
		$this->loadModel( 'Medico' );
		if( $this->Medico->find( 'count', array( 'conditions' => array( 'usuario_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. \n <b>Razon:</b> El usuario tiene un medico asociado" );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->loadModel( 'Secretaria' );
		if( $this->Secretaria->find( 'count', array( 'conditions' => array( 'usuario_id' => $id ) ) ) > 0 ) {
			$this->Session->setFlash( "No se pudo eliminar el usuario solicitado. \n <b>Razon:</b> El usuario tiene una secretaria asociada" );
			$this->redirect( array( 'action' => 'index' ) );
		}*/
		if( $this->Usuario->delete() ) {
			$this->Session->setFlash( 'El Usuario ha sido eliminado correctamente', 'default',  array( 'class' => 'sucess' ) );
			$this->redirect( array( 'action'=>'index' ) );
		}
		$this->Session->setFlash( 'El Usuario no fue eliminado.', 'default', array( 'class' => 'error' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}


	public function administracion_cambiarContra( $id_usuario = null ) {
		if( $this->request->is( 'post' ) ) {
			if( $this->data['Usuario']['contra'] != $this->data['Usuario']['recontra'] ) {
				$this->Session->setFlash( "Las contraseñas no coinciden." );
			} else {
				if( $this->Usuario->save( $this->data, false ) ) {
					$this->Session->setFlash( "Contraseña cambiada correctamente", 'default', array( 'class' => 'success' ) );
					$this->redirect( array( 'action' => 'index' ) );
				} else {
					$this->Session->setFlash( "No se pudo cambiar la contraseña", 'default',  array( 'class' => 'error' ) );
					pr( $this->Usuario->invalidFields() );
				}
			}
		}
		$this->Usuario->id = $id_usuario;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException( 'El usuario no es valido', 'default', array( 'class' => 'error' ) );
		}
		$this->set( 'data', $this->Usuario->read() );
	}
}
