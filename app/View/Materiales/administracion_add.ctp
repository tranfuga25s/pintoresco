<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Materiales', array( 'action' => 'index' ) ); ?>
</div>	
<br />
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><h2>Agregar Material</h2></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('codigo_g');
		echo $this->Form->input('publicado');
		echo $this->Form->input('introduccion', array( 'class' => 'ckeditor' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>