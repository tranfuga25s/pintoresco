<?php

$marcas = $this->requestAction( array( 'controller' => 'marcas', 'action' => 'index' ) );
pr( $marcas );
foreach( $marcas as $marca ) : ?>
<div class="marca">
	<?php echo $this->Html->link(
		$this->Html->image( $marca['Marca']['logo'], array( 'border' => 0 ) ).'<span>'.$marca['Marca']['nombre'].'</span>',
		$marca['url'],
		array( 'escape' => false )
	); ?>
</div>
	
<?php endforeach; ?>