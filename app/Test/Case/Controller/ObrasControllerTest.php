<?php

App::uses('ObrasController', 'Controller');

/**
 * ObrasController Test Case
 *
 */
class ObrasControllerTest extends ControllerTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.obra',
        'app.pintor',
        'app.usuario',
        'app.grupo'
    );

    public function testA() {
        $this->assertEqual(true, true);
    }

}
