<div class="obras index">
	<h2>Obras</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_obra'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('pintor_id'); ?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php
	foreach ($obras as $obra): ?>
	<tr>
		<td><?php echo h($obra['Obra']['id_obra']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['created']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obra['Pintor']['id_pintor'], array('controller' => 'pintors', 'action' => 'view', $obra['Pintor']['id_pintor'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $obra['Obra']['id_obra'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $obra['Obra']['id_obra'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $obra['Obra']['id_obra']), null, __('Are you sure you want to delete # %s?', $obra['Obra']['id_obra'])); ?>
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
		<li><?php echo $this->Html->link(__('New Obra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pintors'), array('controller' => 'pintors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pintor'), array('controller' => 'pintors', 'action' => 'add')); ?> </li>
	</ul>
</div>
