<?php
App::uses('Especialidad', 'Model');

/**
 * Especialidad Test Case
 *
 */
class EspecialidadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.especialidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Especialidad = ClassRegistry::init('Especialidad');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Especialidad);

		parent::tearDown();
	}

}
