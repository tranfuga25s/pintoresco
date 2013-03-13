<div class="tipos view">
<h2><?php  echo __('Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id Tipo'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['id_tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo'), array('action' => 'edit', $tipo['Tipo']['id_tipo'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo'), array('action' => 'delete', $tipo['Tipo']['id_tipo']), null, __('Are you sure you want to delete # %s?', $tipo['Tipo']['id_tipo'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Productos'); ?></h3>
	<?php if (!empty($tipo['Producto'])): ?>
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
		<th><?php echo __('Tipo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipo['Producto'] as $producto): ?>
		<tr>
			<td><?php echo $producto['id_producto']; ?></td>
			<td><?php echo $producto['nombre']; ?></td>
			<td><?php echo $producto['marca_id']; ?></td>
			<td><?php echo $producto['categoria_id']; ?></td>
			<td><?php echo $producto['presentacion']; ?></td>
			<td><?php echo $producto['rendimiento']; ?></td>
			<td><?php echo $producto['colores']; ?></td>
			<td><?php echo $producto['created']; ?></td>
			<td><?php echo $producto['modified']; ?></td>
			<td><?php echo $producto['publicado']; ?></td>
			<td><?php echo $producto['tipo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $producto['id_producto'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $producto['id_producto'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $producto['id_producto']), null, __('Are you sure you want to delete # %s?', $producto['id_producto'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
