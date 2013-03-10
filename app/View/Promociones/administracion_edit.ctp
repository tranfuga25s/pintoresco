<div class="promociones form">
<?php echo $this->Form->create('Promocion'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Promocione'); ?></legend>
	<?php
		echo $this->Form->input('id_promocion');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('imagen');
		echo $this->Form->input('valido_desde');
		echo $this->Form->input('valido_hasta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promocion.id_promocion')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Promocion.id_promocion'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('action' => 'index')); ?></li>
	</ul>
</div>
