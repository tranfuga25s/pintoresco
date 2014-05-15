<?php
App::uses('Idea', 'Model');

/**
 * Idea Test Case
 *
 */
class IdeaTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.idea'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        //$this->Idea = ClassRegistry::init('Idea');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        //unset($this->Idea);

        parent::tearDown();
    }

    public function testA() { $this->assertEqual( true, true ); }    
}
