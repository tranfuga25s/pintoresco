<?php

/**
 * ConvenioFixture
 *
 */
class ConvenioFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $import = array( 'model' => 'Convenio', 'records' => false );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id_convenio' => 1,
            'fecha_inicio' => '2012-12-28 00:30:24',
            'fecha_fin' => '2012-12-28 00:30:24',
            'documentacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'forma_pago' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'descuento' => 1,
            'organismo_id' => 1
        ),
    );

}
