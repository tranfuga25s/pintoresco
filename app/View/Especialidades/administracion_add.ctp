<?php $this->set( 'title_for_layout', "Agregar especialidad" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de especialidades', array('action' => 'index')); ?>
</div>
<br />
<div class="marcas form">
<?php echo $this->Form->create('Especialidad'); ?>
	<fieldset>
		<legend>Agregar especialidad de pintor</legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
	<?php echo $this->Form->end( 'Agregar' ); ?>
</div>