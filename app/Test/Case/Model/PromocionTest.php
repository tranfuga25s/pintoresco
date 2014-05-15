<?php

App::uses('Promocion', 'Model');

/**
 * Promocion Test Case
 *
 */
class PromocionTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.promocion'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        //$this->Promocion = ClassRegistry::init('Promocion');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        //unset($this->Promocion);

        parent::tearDown();
    }

    public function testA() {
        $this->assertEqual(true, true);
    }

}
