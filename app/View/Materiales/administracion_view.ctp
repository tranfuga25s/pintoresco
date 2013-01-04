<div class="materiales view">
<h2><?php  echo __('Materiale'); ?></h2>
	<dl>
		<dt><?php echo __('Id Material'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['id_material']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Introduccion'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['introduccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicado'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['publicado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Materiale'), array('action' => 'edit', $materiale['Materiale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Materiale'), array('action' => 'delete', $materiale['Materiale']['id']), null, __('Are you sure you want to delete # %s?', $materiale['Materiale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('action' => 'add')); ?> </li>
	</ul>
</div>
