<div class="organismos view">
<h2><?php  echo __('Organismo'); ?></h2>
	<dl>
		<dt><?php echo __('Id Organismo'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['id_organismo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horarios'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['horarios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefonos'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['telefonos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($organismo['Organismo']['logo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organismo'), array('action' => 'edit', $organismo['Organismo']['id_organismo'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organismo'), array('action' => 'delete', $organismo['Organismo']['id_organismo']), null, __('Are you sure you want to delete # %s?', $organismo['Organismo']['id_organismo'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organismos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organismo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Convenios'); ?></h3>
	<?php if (!empty($organismo['Convenio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Convenio'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Documentacion'); ?></th>
		<th><?php echo __('Forma Pago'); ?></th>
		<th><?php echo __('Descuento'); ?></th>
		<th><?php echo __('Organismo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organismo['Convenio'] as $convenio): ?>
		<tr>
			<td><?php echo $convenio['id_convenio']; ?></td>
			<td><?php echo $convenio['fecha_inicio']; ?></td>
			<td><?php echo $convenio['fecha_fin']; ?></td>
			<td><?php echo $convenio['documentacion']; ?></td>
			<td><?php echo $convenio['forma_pago']; ?></td>
			<td><?php echo $convenio['descuento']; ?></td>
			<td><?php echo $convenio['organismo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'convenios', 'action' => 'view', $convenio['id_convenio'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'convenios', 'action' => 'edit', $convenio['id_convenio'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'convenios', 'action' => 'delete', $convenio['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['id_convenio'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
