<div class="materiales view">
	<h1><?php echo $material['Material']['nombre']; ?></h2>
	<div class="introduccion">
		<?php echo $material['Material']['introduccion']; ?>
	</div>
	<?php if( count( $material['Producto'] ) > 0 ) : ?>
	<div class="productos">
		<h2>Productos disponibles para este material:</h2>
		<?php foreach( $material['Producto'] as $producto ) : ?>
			<div class="producto"><?php echo $this->Html->link( h( $producto['nombre'] ), array( 'controller' => 'prodcuto', 'action' => 'view', $producto['id_producto'] ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>