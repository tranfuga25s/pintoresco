<?php
$this->set( 'title_for_layout', "Pintar ".$material['Material']['nombre'] );
?>
<div class="materiales">
	<span class="titulos">¿Con qué pinto?</span>
	<br />
	<br />
	<span class="titulos"><?php echo $material['Material']['nombre']; ?></span>
	<br />
	<?php 
		if( $material['Material']['imagen'] == null ) : $material['Material']['imagen'] = 'material_generico.png'; endif; 
		echo  $this->Html->image( $material['Material']['imagen'], array( 'class' => 'imagen-material', 'alt' => $material['Material']['nombre'] ) );
	?>
	<div class="txt-general">
		<?php echo $material['Material']['introduccion']; ?>
	</div>
	<br />
	<?php if( count( $material['Producto'] ) > 0 ) : ?>
	<div class="productos">
		<h2>Productos disponibles para este material:</h2>
		<table border="0">
			<tbody>
				<tr><td colspan="9">&nbsp;</td></tr>
		<?php foreach( $material['Producto'] as $producto ) {
				echo $this->element( 'producto', array( 'producto' => $producto ) );
		} ?>
			</tbody>
		</table>			
	</div>
	<?php else : ?>
	<div class="">No existen productos asociados a este material todavía.</div>
	<?php endif; ?>
	<br />

</div>	