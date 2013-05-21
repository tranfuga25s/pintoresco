<div class="superficies form">
<?php echo $this->Form->create('Superficie'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Superficie'); ?></legend>
	<?php
		echo $this->Form->input('id_superficie');
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Superficie.id_superficie')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Superficie.id_superficie'))); ?></li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('action' => 'index')); ?></li>
	</ul>
</div>
