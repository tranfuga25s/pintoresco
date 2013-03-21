<?php
$this->set( 'title_for_layout', "Agregar nueva idea" );
?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Ideas', array( 'action' => 'index' ) ); ?>
</div>
<br />
<?php echo $this->Form->create('Idea'); ?>
	<fieldset>
		<legend><h2>Agregar idea</h2></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('publicado');
		echo $this->Form->input('contenido', array( 'class' => 'ckeditor' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>