<?php
$this->set( 'title_for_layout', "Contactese con nosotros" );
?>
<?php echo $this->Form->create( false, array( 'url' => '/contacto/enviar', 'id' => 'formcontacto' ) ); ?>
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
			<td><?php echo $this->Form->input( 'nombre', array( 'label' => false, 'class' => 'form_contacto', 'value' => isset( $contacto['nombre'] ) ? $contacto['nombre'] : '' ) ); ?></td>
			<td rowspan="5"><?php echo $this->Html->image( 'img_contacto.png', array( 'border' => 0 ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Email*:</td>
			<td><?php echo $this->Form->input( 'email', array( 'label' => false, 'class' => 'form_contacto', 'type' => 'text' , 'value' => isset( $contacto['email'] ) ? $contacto['email'] : '' ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Teléfono:</td>
			<td><?php echo $this->Form->input( 'telefono', array( 'label' => false, 'class' => 'form_contacto', 'value' => isset( $contacto['telefono'] ) ? $contacto['telefono'] : '' ) ); ?></td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Motivo*:</td>
			<td><?php
							echo $this->Form->input( 'motivo', array( 'label' => false,
						'options' => array( 'Consultas' => 'Consultas',
											'Asesoramiento' => 'Asesoramiento',
											'Sugerencias' => 'Sugerencias',
											'Presupuesto' => 'Presupuesto',
											'Soy Pintor' => 'Soy Pintor' ),
						'style' => 'width: 263px;',
						'selected' => isset( $contacto['motivo'] ) ? $contacto['motivo'] : ''
			) );
			?>
			</td>
		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Consulta:*</td>
			<td><?php echo $this->Form->input( 'texto', array( 'label' => false, 'type' => 'textarea', 'rows' => 7, 'style' => 'width: 263px;', 'value' => isset( $contacto['texto'] ) ? $contacto['texto'] : '' ) ); ?></td>

		</tr>
		<tr>
			<td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#201584; font-weight:bold;">Codigo de verificación:*</td>
			<td valign="top">
			    <?php
			    echo $this->Html->image($this->Html->url(array('action'=>'captcha'), true),array('style'=>'','vspace'=>2));
                echo '<br />Ingrese el código mostrado arriba:';
                echo $this->Form->input('captcha',array('autocomplete'=>'off','label'=>false,'class'=>''));
			    echo $this->Html->tag( 'div', '', array( 'class' => 'bt_enviar', 'onclick' => "$('#formcontacto').submit()", 'style' => 'float: right; margin-right: 50px; margin-top:12px;' ) ); ?>
			</td>
			<td rowspan="1" align="left" valign="top" style=" font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#646464;  line-height:30px; padding-top:80px;">
			    <span class="titulos">Sucursales</span><br />
                Salta 2974 - Tel.: (0341) 436 1389<br />
                Buenos Aires esq. San Luis - Tel.: (0341) 4265068 / 426 6573<br />
                Catamarca esq. Santiago - Tel.: (0341) 156 753164<br />
                Eva Perón 5906 (Córdoba Y Solís)
            </td>
		</tr>
		<tr>
			<td colspan="3" style="padding-left:330px;">

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
