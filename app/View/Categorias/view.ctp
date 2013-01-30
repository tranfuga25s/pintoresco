<div class="categorias view">
<h2><?php  echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id Categoria'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id_categoria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Padre'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoria['Padre']['nombre'], array('controller' => 'categorias', 'action' => 'view', $categoria['Padre']['id_categoria'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicado'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['publicado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id_categoria'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id_categoria']), null, __('Are you sure you want to delete # %s?', $categoria['Categoria']['id_categoria'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padre'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categorias'); ?></h3>
	<?php if (!empty($categoria['Hijos'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Categoria'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Publicado'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Hijos'] as $hijos): ?>
		<tr>
			<td><?php echo $hijos['id_categoria']; ?></td>
			<td><?php echo $hijos['nombre']; ?></td>
			<td><?php echo $hijos['parent_id']; ?></td>
			<td><?php echo $hijos['lft']; ?></td>
			<td><?php echo $hijos['rght']; ?></td>
			<td><?php echo $hijos['publicado']; ?></td>
			<td><?php echo $hijos['created']; ?></td>
			<td><?php echo $hijos['modified']; ?></td>
			<td><?php echo $hijos['descripcion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categorias', 'action' => 'view', $hijos['id_categoria'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categorias', 'action' => 'edit', $hijos['id_categoria'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categorias', 'action' => 'delete', $hijos['id_categoria']), null, __('Are you sure you want to delete # %s?', $hijos['id_categoria'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hijos'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Productos'); ?></h3>
	<?php if (!empty($categoria['Productos'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Producto'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Marca Id'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Presentacion'); ?></th>
		<th><?php echo __('Rendimiento'); ?></th>
		<th><?php echo __('Colores'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Publicado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Productos'] as $productos): ?>
		<tr>
			<td><?php echo $productos['id_producto']; ?></td>
			<td><?php echo $productos['nombre']; ?></td>
			<td><?php echo $productos['marca_id']; ?></td>
			<td><?php echo $productos['categoria_id']; ?></td>
			<td><?php echo $productos['presentacion']; ?></td>
			<td><?php echo $productos['rendimiento']; ?></td>
			<td><?php echo $productos['colores']; ?></td>
			<td><?php echo $productos['created']; ?></td>
			<td><?php echo $productos['modified']; ?></td>
			<td><?php echo $productos['publicado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $productos['id_producto'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $productos['id_producto'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $productos['id_producto']), null, __('Are you sure you want to delete # %s?', $productos['id_producto'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
