<?php

App::uses('Pintor', 'Model');

/**
 * Pintor Test Case
 *
 */
class PintorTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.pintor',
        'app.usuario',
        'app.grupo',
        'app.obra'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Pintor = ClassRegistry::init('Pintor');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Pintor);

        parent::tearDown();
    }

    public function testA() { $this->assertEqual( true, true ); }    
}
