<?php

App::uses('Organismo', 'Model');

/**
 * Organismo Test Case
 *
 */
class OrganismoTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.organismo',
        'app.convenio'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Organismo = ClassRegistry::init('Organismo');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Organismo);

        parent::tearDown();
    }

    public function testA() { $this->assertEqual( true, true ); }    
}
