<?php echo $this->set( 'title_for_layout', "Modificar convenio" ); ?>
<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Convenio.id_convenio')), null, 'Está seguro que desea eliminar este convenio?' );
	      echo $this->Html->link( 'Lista de Convenios', array( 'action' => 'index' ) ); ?>
</div>
<div class="convenios form">
<?php echo $this->Form->create('Convenio'); ?>
	<fieldset>
		<legend><h2>Editar convenio</h2></legend>
	<?php
		echo $this->Form->input('id_convenio');
		echo $this->Form->input( 'organismo_id');
		echo $this->Form->input( 'titulo', array( 'type' => 'text' ) );
		echo $this->Form->input( 'fecha_inicio', array( 'dateFormat' => 'DMY', 'type' => 'date' ) );
		echo $this->Form->input( 'fecha_fin', array( 'dateFormat' => 'DMY', 'type' => 'date' ) );
		echo $this->Form->input( 'documentacion');
		echo $this->Form->input( 'forma_pago'   );
		echo $this->Form->input( 'descuento', array( 'after' => '%' ) );
		echo $this->Form->input( 'destino', array( 'type' => 'text' ) );
		echo $this->Form->input( 'publicado' );
	?>
	</fieldset>
	<?php echo $this->Form->end( ' Guardar ' ); ?>
</div>