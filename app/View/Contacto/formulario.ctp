<?php 
$this->set( 'title_for_layout', "Contactese con nosotros" ); 
?>
<?php echo $this->Form->create( 'contacto', array( 'url' => '/contacto/enviar' ) ); ?>
<table border="0" width="96%" style="margin-left:25px;">
	<tbody>
		<tr>
			<td  colspan="3" style="border-bottom: 2px #201584 solid; padding-top:20px; padding-bottom:10px; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#201584; font-weight:bold;">Contacto</td>
		</tr>
		<tr>
			<td colspan="3" style=" padding-top:20px; padding-bottom:30px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#646464; font-weight:bold;">Utilice el siguiente formulario para enviarnos su consulta:</td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Nombre*:</td>
			<td colspan="2"><?php echo $this->Form->input( 'nombre', array( 'label' => false, 'class' => 'form_contacto' ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Email*:</td>
			<td colspan="2"><?php echo $this->Form->input( 'email', array( 'label' => false, 'class' => 'form_contacto', 'type' => 'text' ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Telefono:</td>
			<td colspan="2"><?php echo $this->Form->input( 'telefono', array( 'label' => false, 'class' => 'form_contacto' ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Motivo*:</td>
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
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Consulta:*</td>
			<td><?php echo $this->Form->input( 'texto', array( 'label' => false, 'type' => 'textarea', 'class' => 'form_contacto'  ) ); ?></td>
			<td rowspan="2" align="left" valign="top" style=" font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#646464;  line-height:30px; padding-top:80px;">
				Sucursal Salta 2974 - Tel.: (0341) 436 1389<br />
				Sucursal Buenos Aires esq. San Luis - Tel.: (0341) 4265068 / 426 6573<br />
				Sucursal Catamarca esq. Santiago - Tel.: (0341) 156 753164<br />
			</td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Codigo de verificación:*</td>
			<td><?php echo $this->Recaptcha->display(); ?></td>
		</tr>
		<tr>
			<td colspan="3" style="padding-left:330px;">
				<?php echo $this->Html->tag( 'div', '', array( 'class' => 'bt_enviar', 'onclick' => "$('#contactoFormularioForm').submit()" ) ); ?>
			</td>
		</tr>
	</tbody>
</table>	
<?php echo $this->Form->end(); ?>
<table border="0" width="100%">
	<tbody>
		<tr>
		<br /><br /><br />
			<td><?php echo $this->Html->image( 'contacto1.jpg' ); ?></td>
			<td><?php echo $this->Html->image( 'contacto2.jpg' ); ?></td>
			<td><?php echo $this->Html->image( 'contacto3.jpg' ); ?></td>
		</tr>
	</tbody>
</table>
		