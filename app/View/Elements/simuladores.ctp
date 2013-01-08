<h3>Simuladores</h3>
<?php $simuladores = $this->requestAction( array( 'controller' => 'marcas', 'action' 0> 'lista_simuladores' ) );  ?>
Listado de simuladores disponibles<br />
<?php foreach( $simuladores as $simulador ) : ?>
<div class="Simulador">
    <?php echo $tis->Html->link( $simulador['Marca']['nombre'] ), $simulador['Marca']['simulador'] ) ); ?>
</div>
<?php endforeach; ?>