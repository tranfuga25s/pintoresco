<div class="marcas form">
<?php echo $this->Form->create('Marca'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Marca'); ?></legend>
	<?php
		echo $this->Form->input('id_marca');
		echo $this->Form->input('nombre');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Marca.id_marca')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Marca.id_marca'))); ?></li>
		<li><?php echo $this->Html->link(__('List Marcas'), array('action' => 'index')); ?></li>
	</ul>
</div>
