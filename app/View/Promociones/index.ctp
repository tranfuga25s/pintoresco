<?php $this->set( 'title_for_layout', "Promociones Disponibles" ); ?>
<div class="promociones index">
	<h2>Promociones</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('valido_desde'); ?></th>
			<th><?php echo $this->Paginator->sort('valido_hasta'); ?></th>
	</tr>
	<?php
	foreach ($promociones as $promocion): ?>
	<tr>
		<td><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['valido_desde']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['valido_hasta']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>