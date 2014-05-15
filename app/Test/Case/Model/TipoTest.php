<?php

App::uses('Tipo', 'Model');

/**
 * Tipo Test Case
 *
 */
class TipoTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.tipo',
        'app.producto',
        'app.marca',
        'app.categoria',
        'app.material',
        'app.productos_material'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Tipo = ClassRegistry::init('Tipo');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Tipo);

        parent::tearDown();
    }

    public function testA() { $this->assertEqual( true, true ); }    
}
