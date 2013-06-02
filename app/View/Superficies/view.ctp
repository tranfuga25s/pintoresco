<?php
$this->set( 'title_for_layout', "Pintar sobre ".$superficie['Superficie']['nombre'] );
?>
<div class="superficies">
    <span class="titulos">¿Con qué pinto?</span>
    <br />
    <br />
    <span class="titulos"><?php echo $superficie['Superficie']['nombre']; ?></span>
    <br />
    <?php
        if( $superficie['Superficie']['imagen'] == null ) : $superficie['Superficie']['imagen'] = 'material_generico.png'; endif;
        echo  $this->Html->image( $superficie['Superficie']['imagen'], array( 'class' => 'imagen-material', 'alt' => $superficie['Superficie']['nombre'] ) );
    ?>
    <!-- <div class="txt-general">
        <?php echo $superficie['Superficie']['introduccion']; ?>
    </div> -->
    <br />
    <?php if( count( $superficie['Producto'] ) > 0 ) : ?>
    <div class="productos">
        <h2>Productos disponibles para este material:</h2>
        <table border="0">
            <tbody>
                <tr><td colspan="9">&nbsp;</td></tr>
        <?php foreach( $superficie['Producto'] as $producto ) {
                echo $this->element( 'producto', array( 'producto' => $producto ) );
        } ?>
            </tbody>
        </table>
    </div>
    <?php else : ?>
    <div class="">No existen productos asociados a esta superficie todavía.</div>
    <?php endif; ?>
    <br />

</div>