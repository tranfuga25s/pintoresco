<div class="promociones index">
	<h2><?php echo __('Promociones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_promocion'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('valido_desde'); ?></th>
			<th><?php echo $this->Paginator->sort('valido_hasta'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($promociones as $promocion): ?>
	<tr>
		<td><?php echo h($promocion['Promocion']['id_promocion']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['imagen']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['created']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['modified']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['valido_desde']); ?>&nbsp;</td>
		<td><?php echo h($promocion['Promocion']['valido_hasta']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promocion['Promocion']['id_promocion'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promocion['Promocion']['id_promocion'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, __('Are you sure you want to delete # %s?', $promocion['Promocion']['id_promocion'])); ?>
		</td>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promocione'), array('action' => 'add')); ?></li>
	</ul>
</div>
