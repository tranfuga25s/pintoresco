
<table width="955" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="14" height="32" valign="top" bgcolor="201584">
    	<?php echo $this->Html->image( "nada.png", array( "width" => 14, "height" => 27 ) ); ?>
    </td>
  	<td colspan="2" align="left" valign="top" bgcolor="#201584" class="convnios">promociones</td>
  	<td colspan="3" align="center" valign="top" bgcolor="#201584" class="convnios">envios a domicilio</td>
    <td colspan="3" valign="top" bgcolor="#201584" class="convnios">tarjetas 6 cuotas sin interes</td>
  </tr>
  <tr>
    <td height="12" colspan="9" valign="top" bgcolor="#201584">
    <?php echo $this->Html->image( "linea.png", array( "width" => 955, "height" => 4 ) ); ?>
    </td>
  </tr>

  <tr>
  	<td height="49" valign="top" bgcolor="#201584">
  		<?php echo $this->Html->image( "nada.png", array( "width" => 14, "height" => 49 ) ); ?>
  	</td>
<?php
	$datos = array( 0 => 1, 1 => 1, 2 => 1 ); 
	//$datos = $this->requestAction( array( 'controller' => 'promociones', 'action' => 'home' ) );

	if( count( $datos ) != 0 ) {
		foreach( $datos as $promocion ) { ?>
		<td width="49" valign="top" >
			<?php echo $this->Html->image( "imagen_ejemplo.png", array( "width" => 49, "height" => 49 ) ); ?>
		</td>
    	<td width="204" valign="top" bgcolor="#201584" class="promociones">
    		<span class="tit_promociones">
    			<?php echo h( 'Título Promoción' ); ?>
    		</span>
    		<br />
			<?php echo h( 'Texto descriptivo de la promocion' ); ?>
			<br />
		</td>
	<?php } } ?>	
  </tr>
  <tr>
    <td height="5" colspan="9" valign="top" bgcolor="#FFFFFF">
    	<?php echo $this->Html->image( "nada.png", array(  "width" => 14, "height" => 5 ) ); ?>
    </td>
  </tr>
</table>