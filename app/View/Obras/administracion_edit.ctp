<?php $this->set( 'title_for_layout', "Editar obra" ); ?>
<div id="acciones">
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Obra.id_obra')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Obra.id_obra')));
		  echo $this->Html->link(__('List Obras'), array('action' => 'index'));
		  echo $this->Html->link(__('List Pintors'), array('controller' => 'pintors', 'action' => 'index'));
		  echo $this->Html->link(__('New Pintor'), array('controller' => 'pintors', 'action' => 'add')); ?>
</div>
<div class="obras form">
<?php echo $this->Form->create('Obra'); ?>
	<fieldset>
		<legend><h2>Datos de la obra</h2></legend>
	<?php
		echo $this->Form->input('id_obra');
		echo $this->Form->input('pintor_id', array( 'label' => 'Pintor:' ) );
		echo $this->Form->input('fecha', array( 'label' => 'Fecha de realizacion:', 'dateFormat' => 'MY' ) );
		echo $this->Form->input('descripcion', array( 'label' => 'Pequeña descripción:' ) );
	?>
	</fieldset>
	<fieldset>
		<legend><h3>Imagenes de la obra</h3></legend>
		<p>Aquí podrá ingresar las imagenes de la obra</p>
	</fieldset>
	<?php echo $this->Form->end( 'Guardar'); ?>
</div>