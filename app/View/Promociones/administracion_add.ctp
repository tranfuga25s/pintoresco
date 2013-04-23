<?php $this->set( 'title_for_layout', "Agregar una promocion" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de promociones', array( 'action' => 'index' ) ); ?>
</div>
<br />
<div class="promociones form">
<?php echo $this->Form->create('Promocion', array( 'type' => 'file' ) ); ?>
	<fieldset>
		<legend><h2>Agregar promocion</h2></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('imagen', array( 'type' => 'file' ) );
		echo $this->Form->input('dir', array( 'type' => 'hidden' ) );
		echo $this->Form->input('publicado', array( 'label' => 'Publicada' ) );
		echo $this->Form->input('valido_desde', array( 'format' => 'DMY' ) );
		echo $this->Form->input('valido_hasta', array( 'format' => 'DMY' ) );

	?>
	</fieldset>
	<?php echo $this->Form->end('Agregar' ); ?>
</div>