<div class="convenios index">
	<h2><?php echo __('Convenios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_convenio'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
			<th><?php echo $this->Paginator->sort('documentacion'); ?></th>
			<th><?php echo $this->Paginator->sort('forma_pago'); ?></th>
			<th><?php echo $this->Paginator->sort('descuento'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($convenios as $convenio): ?>
	<tr>
		<td><?php echo h($convenio['Convenio']['id_convenio']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['fecha_fin']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['documentacion']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['forma_pago']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['descuento']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $convenio['Convenio']['id_convenio'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $convenio['Convenio']['id_convenio'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $convenio['Convenio']['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['Convenio']['id_convenio'])); ?>
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
		<li><?php echo $this->Html->link(__('New Convenio'), array('action' => 'add')); ?></li>
	</ul>
</div>
