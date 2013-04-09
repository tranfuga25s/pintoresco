<?php
App::uses('Convenio', 'Model');

/**
 * Convenio Test Case
 *
 */
class ConvenioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.convenio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Convenio = ClassRegistry::init('Convenio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Convenio);

		parent::tearDown();
	}

}
