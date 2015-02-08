<?php

App::uses('Grupo', 'Model');

/**
 * Grupo Test Case
 *
 */
class GrupoTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.grupo',
        'app.usuario'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Grupo = ClassRegistry::init('Grupo');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Grupo);
        parent::tearDown();
    }

    public function testEliminacionGrupo() { 
        $group = $this->Grupo->Usuario->find('first', array(
            'fields' => array( 'grupo_id' ),
        ));
        $id_grupo = intval(current(current($group)));
        $this->assertGreaterThan(0, $id_grupo);
        $this->assertFalse( $this->Grupo->delete($id_grupo));        
    }    
    
    public function testEliminarGrupoAdmin() {
        $this->Grupo->Usuario->deleteAll( array("1=1"));
        $this->assertFalse( $this->Grupo->delete(1));
    }
    
}
