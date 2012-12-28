<?php $this->set( 'title_for_layout', "Agregar nueva obra" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Obras', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Pintores', array( 'controller' => 'pintores', 'action' => 'index' ) );
		  echo $this->Html->link( 'Nuevo Pintor', array( 'controller' => 'pintores', 'action' => 'add')); ?>
</div>
<div class="obras form">
<?php echo $this->Form->create('Obra'); ?>
	<fieldset>
		<legend><h2>Agregar obra</h2></legend>
	<?php
		echo $this->Form->input('pintor_id', array( 'label' => 'Pintor:' ) );
		echo $this->Form->input('fecha', array( 'label' => 'Fecha de realizacion:', 'dateFormat' => 'MY' ) );
		echo $this->Form->input('descripcion', array( 'label' => 'Pequeña descripción:' ) );
	?>
	<p>Las imagenes de las obras podrán ser agregadas luego.</p>
	</fieldset>
	<?php echo $this->Form->end( 'Guardar' ); ?>
</div>