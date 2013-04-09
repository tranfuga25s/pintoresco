<?php $this->set( 'title_for_layout', "Editar organismo" ); ?>
<div id="acciones">
<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Organismo.id_organismo')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organismo.id_organismo')));
	  echo $this->Html->link( 'Lista de Organismos', array('action' => 'index'));
	  echo $this->Html->link( 'Lista de Convenios', array('controller' => 'convenios', 'action' => 'index'));
	  echo $this->Html->link( 'Nuevo Convenio', array('controller' => 'convenios', 'action' => 'add')); ?></div>
<br />
<div class="organismos form">
<?php echo $this->Form->create('Organismo'); ?>
	<fieldset>
		<legend><h2>Editar organismo</h2></legend>
	<?php
		echo $this->Form->input('id_organismo');
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('direccion');
		echo $this->Form->input('email', array( 'type' => 'text' ) );
		echo $this->Form->input('horarios', array( 'type' => 'text' ) );
		echo $this->Form->input('telefonos', array( 'type' => 'text' ) );
		//echo $this->Form->input('logo');
	?>
	</fieldset>
	<?php echo $this->Form->end( 'Guardar'); ?>
</div>

