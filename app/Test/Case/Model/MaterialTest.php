<?php

App::uses('Material', 'Model');

/**
 * Material Test Case
 *
 */
class MaterialTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.material'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Material = ClassRegistry::init('Material');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Material);

        parent::tearDown();
    }
    
    public function testA() { $this->assertEqual( true, true ); }    

}
