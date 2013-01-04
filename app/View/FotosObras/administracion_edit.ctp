<div class="fotosObras form">
<?php echo $this->Form->create('FotosObra'); ?>
	<fieldset>
		<legend><?php echo __('Administracion Edit Fotos Obra'); ?></legend>
	<?php
		echo $this->Form->input('id_foto_obra');
		echo $this->Form->input('obra_id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FotosObra.id_foto_obra')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FotosObra.id_foto_obra'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fotos Obras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
