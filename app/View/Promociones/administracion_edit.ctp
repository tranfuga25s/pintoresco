<?php $this->set( 'title_for_layout', "Editar una promocion" ); ?>
<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar promocion', array( 'action' => 'delete', $this->Form->value('Promocion.id_promocion')), null, 'Esta seguro que desea eliminar esta promoción?');
		  echo $this->Html->link( 'Lista de Promociones', array('action' => 'index')); ?>
</div>
<br />
<?php echo $this->Form->create('Promocion', array( 'type' => 'file' ) ); ?>
<fieldset>
	<legend><h2>Editar una promocion</h2></legend>
<?php
	echo $this->Form->input('id_promocion');
	echo $this->Form->input('titulo');
	echo $this->Form->input('descripcion');
	echo $this->Form->input('imagen', array( 'type' => 'file' ) );
	echo $this->Form->input('dir', array( 'type' => 'hidden' ) );
	echo $this->Form->input('publicado');
	echo $this->Form->input('valido_desde');
	echo $this->Form->input('valido_hasta');
?>
</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>