<div class="convenios form">
<?php echo $this->Form->create('Convenio'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Convenio'); ?></legend>
	<?php
		echo $this->Form->input('id_convenio');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
		echo $this->Form->input('documentacion');
		echo $this->Form->input('forma_pago');
		echo $this->Form->input('descuento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Convenio.id_convenio')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Convenio.id_convenio'))); ?></li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('action' => 'index')); ?></li>
	</ul>
</div>
