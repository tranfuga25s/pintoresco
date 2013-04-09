<?php
$this->set( 'title_for_layout', "Editar idea" );
?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Ideas', array('action' => 'index')); ?>
	<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Idea.id_idea')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Idea.id_idea'))); ?>
</div>
<br />
<?php echo $this->Form->create('Idea'); ?>
	<fieldset>
		<legend><h2>Agregar idea</h2></legend>
	<?php
		echo $this->Form->input('id_idea');
		echo $this->Form->input('titulo');
		echo $this->Form->input('publicado');
		echo $this->Form->input('contenido', array( 'class' => 'ckeditor' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>