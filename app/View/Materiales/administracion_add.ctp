<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Materiales', array( 'action' => 'index' ) ); ?>
</div>	
<br />
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><h2>Agregar Material</h2></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('introduccion', array( 'class' => 'ckeditor' ) );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>