
<table width="955" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="14" height="32" valign="top" bgcolor="201584">
    	<?php echo $this->Html->image( "nada.png", array( "width" => 14, "height" => 27 ) ); ?>
    </td>
  	<td colspan="2" align="left" valign="top" bgcolor="#201584" class="convnios txt1">promociones</td>
  	<td colspan="4" align="center" valign="top" bgcolor="#201584" class="convnios txt2">envios a domicilio sin cargo</td>
    <td colspan="3" valign="top" bgcolor="#201584" class="convnios txt3">tarjetas 6 cuotas sin interes</td>
  </tr>
  <tr>
    <td height="12" colspan="10" valign="top" bgcolor="#201584">
    <?php echo $this->Html->image( "linea.png", array( "width" => 955, "height" => 4 ) ); ?>
    </td>
  </tr>

  <tr>
  	<td height="49" valign="top" bgcolor="#201584">
  		<?php echo $this->Html->image( "nada.png", array( "width" => 14, "height" => 49 ) ); ?>
  	</td>
<?php
	$datos = $this->requestAction( array( 'administracion' => false, 'controller' => 'promociones', 'action' => 'home' ) );
	if( count( $datos ) > 0 ) {
		foreach( $datos as $promocion ) {
			// Introduce la imagen predeterminada
			if( $promocion['Promocion']['imagen'] == null ) {
				$promocion['Promocion']['imagen'] = 'imagen_ejemplo.png';
			} else {
				$promocion['Promocion']['imagen'] = 'promociones'.DS.$promocion['Promocion']['dir'].DS.$promocion['Promocion']['imagen'];
			}
		?>
		<td width="49" valign="top"  bgcolor="#201584">
			<?php echo $this->Html->image( $promocion['Promocion']['imagen'], array( "width" => 49, "height" => 49 ) ); ?>
		</td>
    	<td width="204" valign="top" bgcolor="#201584" class="promociones">
    		<span class="tit_promociones">
    			<?php echo $this->Html->link( h( $promocion['Promocion']['titulo'] ), array( 'controller' => 'promociones', 'action' => 'index' ) ); ?>
    		</span>
    		<br />
			<?php echo $promocion['Promocion']['descripcion']; ?>
			<br />
		</td>
	<?php } ?>
		<td bgcolor="#201584">
			<?php echo $this->Html->link( $this->Html->image( "ver_mas_blue.png", array( 'id' => 'ImagenPromo', 'name' => 'imagenPromo' ) ), 
										  array( 'controller' => 'promociones', 'action' => 'index' ), 
										  array( 'escape' => false ) ); ?>
		</td>
        <?php } else { ?>
                <td colspan="7" bgcolor="#201584">&nbsp;</td>
        <?php } ?>
  </tr>
  <tr>
    <td height="5" colspan="10" valign="top" bgcolor="#FFFFFF">
    	<?php echo $this->Html->image( "nada.png", array(  "width" => 14, "height" => 5 ) ); ?>
    </td>
  </tr>
</table>