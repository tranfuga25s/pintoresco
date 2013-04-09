<!-- Formulario de ingreso -->
<script>
	$( function() {
		$( "a", "#inicios" ).button();
	});
</script>
<center>
<div class="decorado1 inicio" id="inicio">
	<div class="titulo1">Formulario de ingreso al sistema</div>
	<table>
		<tbody>
			<tr>
				<td>
					<?php
					echo $this->Form->create( 'Usuario' );
					echo $this->Form->text( 'email', array( 'label' => "Email:" ) )."<br />";
					echo $this->Form->password( 'contra', array( 'label' => "Contraseña:" ) );
					echo $this->Form->end( 'Ingresar' );
					?>
				</td>
				<td id="inicios">
					<?php
					echo $this->Html->link( 'Olvide mi contraseña', array( 'controller' => 'Usuarios', 'action' => 'recuperarContra' ) );
					echo "<br />";
					echo $this->Html->link( 'Registrarme en el sitio', array( 'controller' => 'Usuarios', 'action' => 'registrarse' ) );
					echo "<br />";
					echo $this->Html->link( 'Eliminarme del sitio', array( 'controller' => 'Usuarios', 'action' => 'eliminarUsuario' ) );
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</center>