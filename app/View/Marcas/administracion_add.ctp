<?php $this->set( 'title_for_layout', "Agregar marca" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Marcas', array( 'action' => 'index' ) ); ?>
</div>
<div class="marcas form">
	<?php echo $this->Form->create('Marca'); ?>
	<fieldset>
		<legend><h2>Agregar Marca</h2></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('url');
		echo $this->Form->input('simulador', array( 'label' => 'Simulador', 'after' => 'Ingrese la dirección de el simulador para esta marca' ) );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>
</div>