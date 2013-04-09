<?php
$this->pageTitle = 'Modificar tipo de producto';
?>
<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Tipo.id_tipo')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tipo.id_tipo')));
		  echo $this->Html->link( 'Lista de Tipos', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<?php echo $this->Form->create('Tipo'); ?>
	<fieldset>
		<legend><h2>Editar un tipo</h2></legend>
	<?php
		echo $this->Form->input('id_tipo');
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>