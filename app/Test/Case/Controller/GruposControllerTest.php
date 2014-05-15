<?php

App::uses('GruposController', 'Controller');

/**
 * GruposController Test Case
 *
 */
class GruposControllerTest extends ControllerTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.grupo',
        'app.usuario'
    );

    public function testA() {
        $this->assertEqual(true, true);
    }

}
