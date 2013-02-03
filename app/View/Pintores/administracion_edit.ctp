<?php $this->set( 'title_for_layout', "Editar un pintor" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de pintores', array( 'action' => 'index' ) ); ?>
</div>
<br />
<?php echo $this->Form->create( 'Pintor' );?>
<fieldset>
	<legend><h2>Editar un pintor</h2></legend>
	<fieldset>
		<legend><h3>Datos de usuario</h3></legend>
		<?php
			echo $this->Form->input( 'Usuario.id_usuario' );
			echo $this->Form->input( 'Usuario.email' );
			echo $this->Form->input( 'Usuario.nombre' );
			echo $this->Form->input( 'Usuario.apellido' );
			echo $this->Form->input( 'Usuario.telefono' );
			echo $this->Form->input( 'Usuario.celular' );
			echo $this->Form->input( 'Usuario.nueva_contra', array( 'label' => 'Nueva clave de acceso', 'type' => 'password', 'after' => 'Ingresar la nueva contraseña si desea cambiarla. Para conservar la contraseña actual, deje este campo en blanco.' ) );
		?>
	</fieldset>
	<fieldset>
		<legend><h3>Datos de contacto</h3></legend>
		<?php
			echo $this->Form->input( 'Pintor.id_pintor' );
			echo $this->Form->input( 'Pintor.tipo_doc', array( 'options' => array( 'dni' => 'DNI', 'le' => 'LE', 'lc' => 'LC', 'ci' => 'CI' ) ) );
			echo $this->Form->input( 'Pintor.num_doc', array( 'label' => 'Número de Documento' ) );
			echo $this->Form->input( 'Pintor.horario', array( 'label' => 'Horario de atención:', 'after' => '<small>Ingrese algo como 12:00 a 15:00 hs</small>' ) );
			echo $this->Form->input( 'Especialidad', array( 'options' => $especialidades, 'multiple' => true, 'label' => 'Especialidades aplicables:' ) );
			echo $this->Form->input( 'Pintor.habilitado', array( 'label' => 'Habilitado' ) );
			echo $this->Form->input( 'Pintor.puntos' );
			echo $this->Form->input( 'Pintor.referencias', array( 'label' => 'Referencias:' ) );
		?>
	</fieldset>
    <?php echo $this->Form->end( 'Guardar' ); ?>
</fieldset>
