<?php
App::uses('Controller', 'Controller');

/**
 * 
 */
class AppController extends Controller {

    /**
     *
     * @var array 
     */
    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'contra'),
                    'userModel' => 'Usuario'
                )
            ),
            'authError' => 'Debe ingresar como usuario para poder utilizar esta funcionalidad',
            'loginAction' => array('controller' => 'usuarios', 'action' => 'ingresar', 'administracion' => false),
            'logoutRedirect' => '/',
            'loginRedirect' => array('controller' => 'usuarios', 'action' => 'cpanel', 'administracion' => true),
            'authorize' => array('Controller')
        ),
        'Session',
        'Paginator'
    );

    /**
     *
     * @var array 
     */
    public $helpers = array('Facebook.Facebook');

    // Esto permite que cualquier pagina del controlador Pages sea vista por el publico.
    public function beforeFilter() {
        if ($this->request->params['controller'] == 'pages') {
            $this->Auth->allow('display');
        }
        if ($this->request->administracion == "administracion") {
            $this->layout = 'administracion';
            $this->theme = '';
        }
        // coloco los datos del usuario
        $adentro = $this->Auth->loggedIn();
        $this->set('loggeado', $adentro);
        if ($adentro) {
            $this->set('usuarioactual', $this->Auth->user());
        }
        // Cargo la configuración
        Configure::load('', 'Pintureria');
    }

    /**
     * 
     * @return array
     */
    protected function currentUser() {
        $user = $this->Auth->user();
        $user['id'] = $user['id_usuario']; // Transformación para que la auditoría funcione
        return $user; # Return the complete user array
    }

}
