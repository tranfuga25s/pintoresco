<?php $this->set( 'title_for_layout', "Agregar nuevo pintor" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de pintores', array( 'action' => 'index' ) ); ?>
</div>
<br />
<?php echo $this->Form->create( 'Pintor' );?>
<fieldset>
	<legend><h2>Agregar nuevo pintor</h2></legend>
	<fieldset>
		<legend><h3>Datos de usuario</h3></legend>
		<?php
			echo $this->Form->input( 'Usuario.email' );
			echo $this->Form->input( 'Usuario.nombre' );
			echo $this->Form->input( 'Usuario.apellido' );
			echo $this->Form->input( 'Usuario.telefono' );
			echo $this->Form->input( 'Usuario.celular' );
			echo $this->Form->input( 'Usuario.contra', array( 'type' => 'password', 'label' => 'Contraseña' ) );
			echo $this->Form->input( 'Usuario.confirmacontra', array( 'type' => 'password', 'label' => 'Confirmar contraseña' ) );
			echo $this->Form->input( 'Usuario.grupo_id', array( 'type' => 'hidden', 'value' => 4 ) );
		?>
	</fieldset>
	<fieldset>
		<legend><h3>Datos de contacto</h3></legend>
		<?php
			echo $this->Form->input( 'Pintor.tipo_doc', array( 'options' => array( 'dni' => 'DNI', 'le' => 'LE', 'lc' => 'LC', 'ci' => 'CI' ) ) );
			echo $this->Form->input( 'Pintor.num_doc', array( 'label' => 'Número de Documento' ) );
			echo $this->Form->input( 'Pintor.horario', array( 'label' => 'Horario de atención:', 'after' => '<small>Ingrese algo como 12:00 a 15:00 hs</small>' ) );
			echo $this->Form->input( 'Pintor.especialidad_id', array( 'options' => $especialidades, 'multiple' => true, 'label' => 'Especialidades aplicables:' ) );
			echo $this->Form->input( 'Pintor.habilitado', array( 'label' => 'Habilitado:' ) );
			echo $this->Form->input( 'Pintor.referencias', array( 'label' => 'Referencias:', 'class' => 'ckeditor' ) );
		?>
	</fieldset>
    <?php echo $this->Form->end( 'Agregar' ); ?>
</fieldset>
