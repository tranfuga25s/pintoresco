<div class="organismos index">
	<h2><?php echo __('Organismos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_organismo'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('horarios'); ?></th>
			<th><?php echo $this->Paginator->sort('telefonos'); ?></th>
			<th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($organismos as $organismo): ?>
	<tr>
		<td><?php echo h($organismo['Organismo']['id_organismo']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['email']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['horarios']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['telefonos']); ?>&nbsp;</td>
		<td><?php echo h($organismo['Organismo']['logo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organismo['Organismo']['id_organismo'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organismo['Organismo']['id_organismo'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organismo['Organismo']['id_organismo']), null, __('Are you sure you want to delete # %s?', $organismo['Organismo']['id_organismo'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organismo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
	</ul>
</div>
