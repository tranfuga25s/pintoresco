<?php $this->set( 'title_for_layout', "Agregar nuevo convenio" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Convenios', array( 'action' => 'index' ) ); ?>
</div>
<br />
<div class="convenios form">
<?php echo $this->Form->create('Convenio'); ?>
	<fieldset>
		<legend><h2>Agregar nuevo convenio</h2></legend>
	<?php
		echo $this->Form->input( 'organismo_id' );
		echo $this->Form->input( 'titulo', array( 'type' => 'text' ) );
		echo $this->Form->input( 'fecha_inicio', array( 'dateFormat' => 'DMY', 'type' => 'date' ) );
		echo $this->Form->input( 'fecha_fin', array( 'dateFormat' => 'DMY', 'type' => 'date' ) );
		echo $this->Form->input( 'documentacion', array( 'class' => 'ckeditor' ) );
		echo $this->Form->input( 'forma_pago', array( 'class' => 'ckeditor' )    );
		echo $this->Form->input( 'descuento', array( 'after' => '%' ) );
		echo $this->Form->input( 'destino', array( 'type' => 'text' ) );
		echo $this->Form->input( 'publicado' );
	?>
	</fieldset>
	<?php echo $this->Form->end( '  Agregar  ' ); ?>
</div>