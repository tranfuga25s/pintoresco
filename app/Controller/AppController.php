<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
		public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array( 'username' => 'email', 'password' => 'contra' ),
					'userModel' => 'Usuario'
				)
			),
			'authError'      => 'Debe ingresar como usuario para poder utilizar esta funcionalidad',
			'loginAction'    => array( 'controller' => 'usuarios', 'action' => 'ingresar' ),
			'logoutRedirect' => '/',
			'loginRedirect'  => array( 'controller' => 'turnos'  , 'action' => 'index'    ),
			'authorize'      => array( 'Controller' )
		),
		'Session'
	);

	public $helpers = array( 'Facebook.Facebook' );

	// Esto permite que cualquier pagina del controlador Pages sea vista por el publico.
	public function beforeFilter() {
		if( $this->request->params['controller'] == 'pages' ) {
			$this->Auth->allow( 'display' );
		}
		if( $this->request->administracion == "administracion" ) {
			$this->layout = 'administracion';
			$this->theme = '';
		}
		// coloco los datos del usuario
		$adentro = $this->Auth->loggedIn();
		$this->set( 'loggeado', $adentro );
		if( $adentro ) {
			$this->set( 'usuarioactual', $this->Auth->user() );
		}
		// Cargo la configuración
		Configure::load( '', 'Pinturas' );
	}

	protected function currentUser() {
       $user = $this->Auth->user();
	   $user['id'] = $user['id_usuario']; // Transformación para que la auditoría funcione
       return $user; # Return the complete user array
    }
}
