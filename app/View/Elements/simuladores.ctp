<h3>Simuladores</h3>
<?php $simuladores = $this->requestAction( array( 'controller' => 'marcas', 'action' => 'lista_simuladores' ) );  ?>
Listado de simuladores disponibles<br />
<?php foreach( $simuladores as $simulador ) : ?>
<div class="Simulador">
    <?php echo $this->Html->link( h( $simulador['Marca']['nombre'] ), $simulador['Marca']['simulador'] ); ?>
</div>
<?php endforeach; ?>