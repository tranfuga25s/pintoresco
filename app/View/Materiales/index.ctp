<div class="materiales">
	<h1 class="titulo">¿Con qué pinto?</h1>
	<span class="orden">Ordenar por: <?php echo $this->Paginator->sort('nombre'); ?></span>	
	<?php foreach ($materiales as $material): ?>
	<div class="material">
		<div class="nombre"><?php echo $this->Html->link( h($material['Material']['nombre'] ), array( 'controller' => 'materiales', 'action' => 'view', $material['Material']['id_material'] ) ); ?>&nbsp;</div>
		<div class="introduccion"><?php echo h($material['Material']['introduccion']); ?>&nbsp;</div>
	</div>
	<?php endforeach; ?>
	<div class="paging">
	<?php
		echo $this->Paginator->prev( '<< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next( 'Siguiente >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>