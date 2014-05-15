<?php

/**
 * PintorFixture
 *
 */
class PintorEspecialidadFixture extends CakeTestFixture {

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pintor_especialidad';

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'pintor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
        'especialidad_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
        'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => array('pintor_id', 'especialidad_id'), 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'pintor_id' => 1,
            'especialidad_id' => 1,
            'created' => '2012-12-27 18:03:55',
            'modified' => '2012-12-27 18:03:55',
        )
    );

}
