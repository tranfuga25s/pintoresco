<div class="materiales">
	<span class="titulos">¿Con qué pinto?</span>
	<br />
	<br />
	<div class="txt_general">Ordenar por: <?php echo $this->Paginator->sort('nombre', 'Nombre', array( 'class' => 'ordenar' ) ); ?></div>	
	<?php foreach ($materiales as $material): ?>
	<div class="material">
		<?php echo $this->Html->link( h($material['Material']['nombre'] ), array( 'controller' => 'materiales', 'action' => 'view', $material['Material']['id_material'] ), array( 'class' => 'sub_titulos') ); ?>&nbsp;<br />
		<div class="txt_general"><?php echo $material['Material']['introduccion']; ?>&nbsp;</div>
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