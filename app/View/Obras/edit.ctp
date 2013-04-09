<div class="obras form">
<?php echo $this->Form->create('Obra'); ?>
	<fieldset>
		<legend><?php echo __('Edit Obra'); ?></legend>
	<?php
		echo $this->Form->input('id_obra');
		echo $this->Form->input('fecha');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('pintor_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Obra.id_obra')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Obra.id_obra'))); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pintors'), array('controller' => 'pintors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pintor'), array('controller' => 'pintors', 'action' => 'add')); ?> </li>
	</ul>
</div>
