<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $this->Form->value('Materiale.id')), null, 'Esta seguro que desea eliminar este material?' );
	      echo $this->Html->link( 'Lista de Materiales', array( 'action' => 'index' ) ); ?>	
</div>
<br />
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><h2>Editar material</h2></legend>
	<?php
		echo $this->Form->input('id_material');
		echo $this->Form->input('nombre');
		echo $this->Form->input('introduccion');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>