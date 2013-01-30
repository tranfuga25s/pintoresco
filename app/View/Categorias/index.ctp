<div class="categorias index">
	<h2><?php echo __('Categorias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_categoria'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($categorias as $categoria): ?>
	<tr>
		<td><?php echo h($categoria['Categoria']['id_categoria']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoria['Padre']['nombre'], array('controller' => 'categorias', 'action' => 'view', $categoria['Padre']['id_categoria'])); ?>
		</td>
		<td><?php echo h($categoria['Categoria']['lft']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['rght']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['publicado']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['created']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['modified']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoria['Categoria']['id_categoria'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoria['Categoria']['id_categoria'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoria['Categoria']['id_categoria']), null, __('Are you sure you want to delete # %s?', $categoria['Categoria']['id_categoria'])); ?>
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
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padre'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
