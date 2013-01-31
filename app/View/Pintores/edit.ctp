<?php $this->set( 'title_for_layout', "Editar mis datos" ); ?>
<h1>Datos personales del pintor</h1>
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
		?>
	</fieldset>
    <?php echo $this->Form->end( 'Guardar' ); ?>
</fieldset>
<fieldset>
	<legend><h2>Listado de Obras</h2></legend>
	<?php echo $this->Html->link( 'Agregar nueva obra', array( 'controller' => 'obras', 'action' => 'add', 'pintor' => $pintor['Pintor']['id_pintor'] ) );
	foreach( $pintor['Obra'] as $obra ) { ?>
	<fieldset>
		<legend>Obra #<?php echo h( $obra['id_obra'] ); ?></legend>
		<b>Fecha de realizaci&oacute;n:</b>&nbsp;<?php echo h( $obra['fecha'] ); ?><br />
		<b>Descripcion:</b>&nbsp;<?php echo h( $obra['descripcion'] ); ?><br />
		<b>Cantidad de imagenes:</b>&nbsp;<?php if( isset( $obra['FotoObra'] ) ) { echo count( $obra['FotoObra'] );  } else { echo "Ninguna"; } ?><br />
		<?php echo $this->Html->link( 'Modificar', array( 'controller' => 'obras', 'edit' => $obra['id_obra'] ) ); ?> - 
		<?php echo $this->Html->link( 'Agregar imagenes', array( 'controller' => 'fotosobras', 'action' => 'add', 'id_obra' => $obra['id_obra'] ) ); ?>
	</fieldset>
	<?php } ?>
</fieldset>
