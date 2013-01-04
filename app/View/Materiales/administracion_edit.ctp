<div class="materiales form">
<?php echo $this->Form->create('Materiale'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Materiale'); ?></legend>
	<?php
		echo $this->Form->input('id_material');
		echo $this->Form->input('nombre');
		echo $this->Form->input('introduccion');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Materiale.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Materiale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('action' => 'index')); ?></li>
	</ul>
</div>
