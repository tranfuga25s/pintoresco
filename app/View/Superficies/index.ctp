<div class="superficies">
    <span class="titulos">¿Con qué pinto?</span>
    <br />
    <br />
    <!-- <div class="txt_general">Ordenar por: <?php echo $this->Paginator->sort('nombre', 'Nombre', array( 'class' => 'ordenar' ) ); ?></div> -->
    <?php foreach ($superficies as $superficie): ?>
    <div class="superficie">
        <?php
        if( $superficie['Superficie']['imagen'] == null ) {
           $superficie['Superficie']['imagen'] = 'superficie_generico.png';
        } else {
           $superficie['Superficie']['imagen'] = 'superficies'.DS.$superficie['Superficie']['id_superficie'].DS.$superficie['Superficie']['imagen'];
        }
        echo $this->Html->link( $this->Html->tag( 'span', h( $superficie['Superficie']['nombre'] ), array( 'class' => 'nombre-superficie' ) ).'<br />'.
                              $this->Html->image( $superficie['Superficie']['imagen'], array( 'class' => 'imagen-superficie-index', 'alt' => $superficie['Superficie']['nombre'] ) ),
                        array( 'controller' => 'superficies', 'action' => 'view', $superficie['Superficie']['id_superficie'] ),
                        array( 'class' => 'sub_titulos', 'escape' => false ) ); ?>
    </div>
    <?php endforeach; ?>
    <br /><br />
    <div class="paging" style="clear:both;">
    <?php
        echo $this->Paginator->prev( '<< Anterior ', array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers( array( 'separator' => ' ' ) );
        echo $this->Paginator->next( ' Siguiente >>', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>