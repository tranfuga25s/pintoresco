<div class="superficies index">
	<h2><?php echo __('Superficies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_superficie'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($superficies as $superficie): ?>
	<tr>
		<td><?php echo h($superficie['Superficie']['id_superficie']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['created']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['modified']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['publicado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $superficie['Superficie']['id_superficie'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $superficie['Superficie']['id_superficie'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $superficie['Superficie']['id_superficie']), null, __('Are you sure you want to delete # %s?', $superficie['Superficie']['id_superficie'])); ?>
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
		<li><?php echo $this->Html->link(__('New Superficie'), array('action' => 'add')); ?></li>
	</ul>
</div>
