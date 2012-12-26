<div class="grupos view">
<h2><?php  echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id Grupo'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id_grupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grupo'), array('action' => 'edit', $grupo['Grupo']['id_grupo'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grupo'), array('action' => 'delete', $grupo['Grupo']['id_grupo']), null, __('Are you sure you want to delete # %s?', $grupo['Grupo']['id_grupo'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>
	<?php if (!empty($grupo['Usuario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Usuario'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Contra'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('Facebook Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($grupo['Usuario'] as $usuario): ?>
		<tr>
			<td><?php echo $usuario['id_usuario']; ?></td>
			<td><?php echo $usuario['email']; ?></td>
			<td><?php echo $usuario['nombre']; ?></td>
			<td><?php echo $usuario['apellido']; ?></td>
			<td><?php echo $usuario['telefono']; ?></td>
			<td><?php echo $usuario['celular']; ?></td>
			<td><?php echo $usuario['contra']; ?></td>
			<td><?php echo $usuario['grupo_id']; ?></td>
			<td><?php echo $usuario['facebook_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'usuarios', 'action' => 'view', $usuario['id_usuario'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'usuarios', 'action' => 'edit', $usuario['id_usuario'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'usuarios', 'action' => 'delete', $usuario['id_usuario']), null, __('Are you sure you want to delete # %s?', $usuario['id_usuario'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
