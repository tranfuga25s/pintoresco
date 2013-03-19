<div class="ideas index">
	<h2><?php echo __('Ideas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_idea'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ideas as $idea): ?>
	<tr>
		<td><?php echo h($idea['Idea']['id_idea']); ?>&nbsp;</td>
		<td><?php echo h($idea['Idea']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($idea['Idea']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($idea['Idea']['publicado']); ?>&nbsp;</td>
		<td><?php echo h($idea['Idea']['created']); ?>&nbsp;</td>
		<td><?php echo h($idea['Idea']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $idea['Idea']['id_idea'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $idea['Idea']['id_idea'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $idea['Idea']['id_idea']), null, __('Are you sure you want to delete # %s?', $idea['Idea']['id_idea'])); ?>
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
		<li><?php echo $this->Html->link(__('New Idea'), array('action' => 'add')); ?></li>
	</ul>
</div>
