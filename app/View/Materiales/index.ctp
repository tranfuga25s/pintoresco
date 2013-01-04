<div class="materiales index">
	<h2><?php echo __('Materiales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_material'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('introduccion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($materiales as $materiale): ?>
	<tr>
		<td><?php echo h($materiale['Materiale']['id_material']); ?>&nbsp;</td>
		<td><?php echo h($materiale['Materiale']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($materiale['Materiale']['introduccion']); ?>&nbsp;</td>
		<td><?php echo h($materiale['Materiale']['created']); ?>&nbsp;</td>
		<td><?php echo h($materiale['Materiale']['modified']); ?>&nbsp;</td>
		<td><?php echo h($materiale['Materiale']['publicado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $materiale['Materiale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $materiale['Materiale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $materiale['Materiale']['id']), null, __('Are you sure you want to delete # %s?', $materiale['Materiale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Materiale'), array('action' => 'add')); ?></li>
	</ul>
</div>
