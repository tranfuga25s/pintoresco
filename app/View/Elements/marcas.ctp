<h3>Nuestras marcas</h3>
<?php
// Muestra las marcas que maneja la painturería
$marcas = $this->requestAction( array( 'controller' => 'marcas', 'action' => 'index' ) );
foreach( $marcas as $marca ) : ?>
<div class="marca">
	<?php
	if( !is_null( $marca['Marca']['logo'] ) ) {
		echo $this->Html->link(
				$this->Html->image( $marca['Marca']['logo'], array( 'border' => 0 ) ).'<span>'.$marca['Marca']['nombre'].'</span>',
				$marca['Marca']['url'],
				array( 'escape' => false )
			);		
	} else {
		echo $this->Html->link( h( $marca['Marca']['nombre'] ), $marca['Marca']['url'] );
	}
	 ?>
</div>
<?php endforeach; ?>