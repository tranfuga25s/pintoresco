<?php

App::uses('FotosObrasController', 'Controller');

/**
 * FotosObrasController Test Case
 *
 */
class FotosObrasControllerTest extends ControllerTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.fotos_obra',
        'app.obra',
        'app.pintor',
        'app.usuario',
        'app.grupo',
        'app.especialidad',
        'app.pintor_especialidad'
    );

    public function testA() {
        $this->assertEqual(true, true);
    }

}
