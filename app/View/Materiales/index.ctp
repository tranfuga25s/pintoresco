<div class="materiales">
	<span class="titulos">¿Con qué pinto?</span>
	<br />
	<br />
	<!-- <div class="txt_general">Ordenar por: <?php echo $this->Paginator->sort('nombre', 'Nombre', array( 'class' => 'ordenar' ) ); ?></div> -->	
	<?php foreach ($materiales as $material): ?>
	<div class="material">
		<?php
		if( $material['Material']['imagen'] == null ) : $material['Material']['imagen'] = 'material_generico.png'; endif; 
		echo $this->Html->link( $this->Html->tag( 'span', h($material['Material']['nombre'] ), array( 'class' => 'nombre-material' ) ).'<br />'.
							  $this->Html->image( $material['Material']['imagen'], array( 'class' => 'imagen-material', 'alt' => $material['Material']['nombre'] ) ), 
						array( 'controller' => 'materiales', 'action' => 'view', $material['Material']['id_material'] ), 
						array( 'class' => 'sub_titulos', 'escape' => false ) ); ?>
	</div>
	<?php endforeach; ?>
	<div class="paging" style="clear:both;">
	<?php
		echo $this->Paginator->prev( '<< Anterior ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers( array( 'separator' => ' ' ) );
		echo $this->Paginator->next( ' Siguiente >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>