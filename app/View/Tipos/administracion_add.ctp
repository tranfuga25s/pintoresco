<?php
$this->pageTitle = 'Agregar nuevo tipo';
?>
<div id="acciones">
<?php echo $this->Html->link(__('List Tipos'), array('action' => 'index'));
	  echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?>
</div>
<br />
<?php echo $this->Form->create('Tipo'); ?>
	<fieldset>
		<legend><h2>Agregar nuevo tipo de producto</h2></legend>
	<?php
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>
