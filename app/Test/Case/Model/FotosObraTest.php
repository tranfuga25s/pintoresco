<?php
App::uses('FotosObra', 'Model');

/**
 * FotosObra Test Case
 *
 */
class FotosObraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fotos_obra',
		'app.obra',
		'app.pintor',
		'app.usuario',
		'app.grupo',
		'app.especialidad',
		'app.pintor_especialidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FotosObra = ClassRegistry::init('FotosObra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FotosObra);

		parent::tearDown();
	}

}
