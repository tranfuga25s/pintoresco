<?php $this->set( 'title_for_layout', "Agregar nuevo organismo" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Organismos', array( 'action' => 'index' ) ); ?>
</div>
<br />
<div class="organismos form">
<?php echo $this->Form->create('Organismo'); ?>
	<fieldset>
		<legend><h2>Agregar nuevo organismo</h2></legend>
	<?php
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('direccion');
		echo $this->Form->input('email', array( 'type' => 'text' ) );
		echo $this->Form->input('horarios', array( 'type' => 'text' ) );
		echo $this->Form->input('telefonos', array( 'type' => 'text' ) );
		///@todo Agregar esto!
		//echo $this->Form->input('logo');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Agregar' ); ?>
</div>