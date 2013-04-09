<div class="obras view">
<h2><?php  echo __('Obra'); ?></h2>
	<dl>
		<dt><?php echo __('Id Obra'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['id_obra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pintor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Pintor']['id_pintor'], array('controller' => 'pintors', 'action' => 'view', $obra['Pintor']['id_pintor'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Obra'), array('action' => 'edit', $obra['Obra']['id_obra'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Obra'), array('action' => 'delete', $obra['Obra']['id_obra']), null, __('Are you sure you want to delete # %s?', $obra['Obra']['id_obra'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pintors'), array('controller' => 'pintors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pintor'), array('controller' => 'pintors', 'action' => 'add')); ?> </li>
	</ul>
</div>
