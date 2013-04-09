<?php $this->set( 'title_for_layout', "Editar especialidad" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de especialidades', array('action' => 'index')); ?>
</div>
<br />
<div class="marcas form">
<?php echo $this->Form->create('Especialidad'); ?>
	<fieldset>
		<legend>Editar especialidad de pintor</legend>
	<?php
		echo $this->Form->input( 'id_especialidad', array( 'type' => 'hidden' ) );
		echo $this->Form->input( 'nombre' );
	?>
	</fieldset>
	<?php echo $this->Form->end( 'Guardar' ); ?>
</div>