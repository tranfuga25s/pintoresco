<?php

App::import('Utility', 'Validation');
App::uses('CakeEmail', 'Network/Email');

class ContactoController extends AppController {

    public $components = array('Captcha');

    public function beforeFilter() {
        $this->Auth->allow(array('formulario', 'enviar', 'captcha'));
        parent::beforeFilter();
    }

    public function isAuthorized($usuario) {
        return true;
    }

    public function formulario() {
        
    }

    public function captcha() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        if (!isset($this->Captcha)) { //if Component was not loaded throug $components array()
            $this->Captcha = $this->Components->load('Captcha', array(
                'width' => 150,
                'height' => 50,
                'theme' => 'random',
            )); //load it
        }
        $this->Captcha->create();
    }

    public function enviar() {
        if ($this->request->isPost()) {
            // Verifico la dirección de email
            if (!Validation::email($this->data['email'], true)) {
                $this->Session->setFlash("La dirección de email ingresado no es válida.", 'default', array('class' => 'error'));
            } else if (empty($this->data['nombre'])) {
                $this->Session->setFlash("Por favor ingrese un nombre de contacto.", 'default', array('class' => 'error'));
            } else if (empty($this->data['texto'])) {
                $this->Session->setFlash("Por favor ingrese una consulta a enviar.", 'default', array('class' => 'error'));
            } else if ($this->Captcha->getVerCode() != $this->data['captcha']) {
                $this->Session->setFlash("Código de verificación incorrecto", 'default', array('class' => 'error'));
            } else {
                $email = new CakeEmail();
                $email->from(array($this->data['email'] => $this->data['nombre']));
                $email->to(Configure::read('Configuracion.email_contacto'));
                $email->subject('Contacto web');
                $email->send('Ha tenido un nuevo contacto a través del sitio web: \n' .
                        'Nombre del contacto:' . $this->data['nombre'] .
                        'Email: ' . $this->data['email'] .
                        'Motivo: ' . $this->data['motivo'] .
                        $this->data['texto']);
                //$this->Session->setFlash( "Su mensaje ha sido enviado correctamente. Gracias por contactarse con nosotros!", 'default', array( 'class' => 'success') );
                $this->redirect(array('controller' => 'pages', 'action' => 'display', 'gracias'));
            }
            $this->set('contacto', $this->data);
            $this->render('formulario');
        } else {
            $this->redirect(array('action' => 'formulario'));
        }
    }

    public function administracion_error() {
        $this->layout = 'administracion';
        if ($this->request->isPost()) {
            // Verifico la dirección de email
            if (!empty($this->data['contacto']['email']) && !Validation::email($this->data['contacto']['email'], true)) {
                $this->Session->setFlash("La dirección de email ingresado no es válida.", 'default', array('class' => 'error'));
                $this->redirect(array('action' => 'formulario'));
            } else {
                $email = new CakeEmail();
                if (empty($this->data['contacto']['email'])) {
                    $email->from(array('noreply@turnossantafe.com.ar' => "No responder!"));
                } else {
                    $email->from(array($this->data['contacto']['email'] => $this->data['contacto']['nombre']));
                }
                $email->to('esteban.zeller@gmail.com');
                $email->subject('Informe de error de turnosonline');
                $texto = 'Ha tenido un nuevo contacto a través del sitio de pintoresco: \n'
                        . $this->data['contacto']['descripcion_corta'] . ' \n'
                        . $this->data['contacto']['detalle'] . ' \n';
                $email->send($texto);
                $this->Session->setFlash("Su mensaje ha sido enviado correctamente. Gracias por contactarse con nosotros!", 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'cpanel'));
            }
        }
        // Averiguo el referer
        $this->set('direccion_error', $this->referer());
    }

    public function administracion_sugerencia() {
        $this->layout = 'administracion';
        if ($this->request->isPost()) {
            $email = new CakeEmail();
            $user = $this->Auth->user();
            $email->from(array($user['email'] => $user['razonsocial']));
            $email->to('esteban.zeller@gmail.com');
            $email->subject('Nueva sugerencia para turnosonline');
            $texto = 'Ha tenido un nuevo contacto a través del sitio de turnosonline: \n'
                    . $this->data['contacto']['descripcion_corta'] . '\n\n'
                    . $this->data['contacto']['detalle'] . '\n'
                    . 'Deseo mantenerme informado de este error: ';
            if ($this->data['contacto']['contactar'] == 1) {
                $texto .= " Si.\n";
                $texto .= " Nombre y direccion: " . $user['razonsocial'] . " - " . $user['email'];
            } else {
                $texto .= " No.";
            }
            $email->send($texto);
            $this->Session->setFlash("Su mensaje ha sido enviado correctamente. Gracias por contactarse con nosotros!", 'default', array('class' => 'success'));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'cpanel'));
        }
    }

}

?>