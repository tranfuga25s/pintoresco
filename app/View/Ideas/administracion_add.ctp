<div class="ideas form">
<?php echo $this->Form->create('Idea'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Add Idea'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('contenido');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ideas'), array('action' => 'index')); ?></li>
	</ul>
</div>
