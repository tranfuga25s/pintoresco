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
        if( $superficie['Superficie']['imagen'] == null ) {
           $superficie['Superficie']['imagen'] = 'superficie_generico.png';
        } else {
           $superficie['Superficie']['imagen'] = 'superficies'.DS.$superficie['Superficie']['id_superficie'].DS.$superficie['Superficie']['imagen'];
        }
        echo  $this->Html->image( $superficie['Superficie']['imagen'], array( 'class' => 'imagen-material', 'alt' => $superficie['Superficie']['nombre'] ) );
    ?>
    <div class="txt-general">
        <?php echo $superficie['Superficie']['descripcion']; ?>
    </div>
    <br />

</div>