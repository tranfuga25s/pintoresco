<?php

App::uses('Superficie', 'Model');

/**
 * Superficie Test Case
 *
 */
class SuperficieTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.superficie'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Superficie = ClassRegistry::init('Superficie');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Superficie);

        parent::tearDown();
    }

    public function testA() { $this->assertEqual( true, true ); }    
}
