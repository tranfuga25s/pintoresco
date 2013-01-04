<h2>Materiales</h2>
<?php echo $this->Paginator->sort('nombre');

foreach ($materiales as $material):
?>
<?php echo h($material['Material']['nombre']); ?>&nbsp;
<?php echo h($material['Material']['introduccion']); ?>&nbsp;
<?php endforeach; ?>
<p><?php echo $this->Paginator->counter(); ?></p>

<div class="paging">
<?php
	echo $this->Paginator->prev( '<< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >>', array(), null, array('class' => 'next disabled'));
?>
</div>