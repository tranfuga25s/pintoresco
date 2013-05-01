<?php 
$this->set( 'title_for_layout', "Contactese con nosotros" ); 
?>
<?php echo $this->Form->create( 'contacto', array( 'url' => '/contacto/enviar' ) ); ?>
<table border="0" width="100%">
	<tbody>
		<tr>
			<td  colspan="3" style="border-bottom: 2px blue solid;">Contacto</td>
		</tr>
		<tr>
			<td colspan="3">Utilice el siguiente formulario para enviarnos su consulta:</td>
		</tr>
		<tr>
			<td>Nombre*:</td>
			<td colspan="2"><?php echo $this->Form->input( 'nombre', array( 'label' => false, 'class' => 'form_contacto' ) ); ?></td>
		</tr>
		<tr>
			<td>Email*:</td>
			<td colspan="2"><?php echo $this->Form->input( 'email', array( 'label' => false, 'class' => 'form_contacto' ) ); ?></td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td colspan="2"><?php echo $this->Form->input( 'telefono', array( 'label' => false, 'class' => 'form_contacto' ) ); ?></td>
		</tr>
		<tr>
			<td>Motivo*:</td>
			<td colspan="2"><?php
							echo $this->Form->input( 'motivo', array( 'label' => false, 
						'options' => array( 'Consultas' => 'Consultas',
											'Asesoramiento' => 'Asesoramiento',
											'Sugerencias' => 'Sugerencias',
											'Presupuesto' => 'Presupuesto',
											'Soy Pintor' => 'Soy Pintor' ),
						'class' => 'form_contacto' 
			) );
			?>
			</td>
		</tr>
		<tr>
			<td>Consulta:*</td>
			<td><?php echo $this->Form->input( 'texto', array( 'label' => false, 'type' => 'textarea', 'class' => 'form_contacto'  ) ); ?></td>
			<td rowspan="2">
				datos de sucursales
			</td>
		</tr>
		<tr>
			<td>Codigo de verificación:</td>
			<td><?php echo $this->Recaptcha->display(); ?></td>
		</tr>
		<tr>
			<td colspan="3"><?php echo $this->Form->end( 'Enviar' ); ?></td>
		</tr>
	</tbody>
</table>	
<table border="1" width="100%">
	<tbody>
		<tr>
			<td><?php echo $this->Html->image( 'contacto1.jpg' ); ?></td>
			<td><?php echo $this->Html->image( 'contacto2.jpg' ); ?></td>
			<td><?php echo $this->Html->image( 'contacto3.jpg' ); ?></td>
		</tr>
	</tbody>
</table>
		