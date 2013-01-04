<div class="fotosObras index">
	<h2><?php echo __('Fotos Obras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_foto_obra'); ?></th>
			<th><?php echo $this->Paginator->sort('obra_id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($fotosObras as $fotosObra): ?>
	<tr>
		<td><?php echo h($fotosObra['FotosObra']['id_foto_obra']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fotosObra['Obra']['fecha'], array('controller' => 'obras', 'action' => 'view', $fotosObra['Obra']['id_obra'])); ?>
		</td>
		<td><?php echo h($fotosObra['FotosObra']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($fotosObra['FotosObra']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($fotosObra['FotosObra']['path']); ?>&nbsp;</td>
		<td><?php echo h($fotosObra['FotosObra']['created']); ?>&nbsp;</td>
		<td><?php echo h($fotosObra['FotosObra']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fotosObra['FotosObra']['id_foto_obra'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fotosObra['FotosObra']['id_foto_obra'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fotosObra['FotosObra']['id_foto_obra']), null, __('Are you sure you want to delete # %s?', $fotosObra['FotosObra']['id_foto_obra'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fotos Obra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
