<?php $this->set( 'title_for_layout', "Agregar marca" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Marcas', array( 'action' => 'index' ) ); ?>
</div>
<div class="marcas form">
	<?php echo $this->Form->create('Marca', array( 'type' => 'file' ) ); ?>
	<fieldset>
		<legend><h2>Agregar Marca</h2></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('url');
		echo $this->Form->input('simulador', array( 'type' => 'text', 'label' => 'Simulador', 'after' => 'Ingrese la dirección de el simulador para esta marca' ) );
		echo $this->Form->input('publicado');
		echo $this->Form->input('logo', array( 'type' => 'file' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>
</div>