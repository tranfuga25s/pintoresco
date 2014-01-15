<!-- Formulario de recuperación de contraseña -->
<?php $this->set( 'title_for_layout', "Recuperar mi contraseña" ); ?>
<br />
<div style="padding-left: 12px;">
	<div class="titulos2">Recuperar mi contrase&ntilde;a</div>
	<center>
	<p>Por favor, ingrese su direcci&oacute;n de correo y recibir&aacute; un mensaje con sus datos para ingresar al sistema.</p>
	<?php
		echo $this->Form->create( 'Recuperar' );
		echo $this->Form->email( 'email' );
		echo $this->Form->end( 'Pedir nueva contraseña' );
	?>
	</center>
	<br />
</div>