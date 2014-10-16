<?php
 if( array_key_exists( 'Producto', $producto ) ) {
 	$producto = array_merge( $producto, $producto['Producto'] );
	unset( $producto['Producto'] );
 }
?>
<tr>
	<td><!-- Margen --></td>
	<td width="125" rowspan="2" valign="top">
		<?php if( !is_null( $producto['imagen'] ) && $producto['imagen'] != '' ) {
			echo $this->Html->image( 'productos'.DS.$producto['dir'].$producto['imagen'], array( 'width' => 125, 'height' => 133 ) );
		  } else {
		  	//echo $this->Html->image( Configure::read( 'Configuracion.imagen_producto_predeterminada' ), array( 'width' => 125, 'height' => 133 ) );
                        echo "&nbsp;";
		  }
		?>
  	</td>
  	<td width="12" rowspan="2" valign="top">&nbsp;</td>
  	<td height="83" colspan="5" valign="top" class="txt_general">
		<span class="tit_ideas"><?php echo strtolower( h( $producto['nombre'] ) ); ?></span><br />
		<?php echo $producto['descripcion']; ?>
  	</td>
  	<td><!-- Margen --></td>
  </tr>
  <tr>
  	<td><!-- Margen --></td>
	<td width="216" height="50" valign="top">
		<span class="sub_tit_producto">Marca:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['Marca']['nombre']; ?></span><br />
		<span class="sub_tit_producto">Colores:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['colores']; ?></span>
	</td>
	<td width="207" valign="top" colspan="2">
		<span class="sub_tit_producto">Envase:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['presentacion']; ?></span><br />
		<span class="sub_tit_producto">Tipo de producto:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['Tipo']['nombre']; ?></span>
	</td>
	<td width="191" valign="top">
		<span class="sub_tit_producto">Rendimiento:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['rendimiento']; ?></span><br />
		<?php if( isset( $producto['Superficie'] ) && count( $producto['Superficie'] > 0 ) ) : ?>
		<span class="sub_tit_producto">Superficie:</span>
		<span class="sub_tit_producto_light"><?php echo ( ( count( $producto['Superficie'] ) > 0 ) ? ( implode( ', ', Set::extract( '{n}.nombre', $producto['Superficie'] ) ) ) : '' ); ?></span>
		<?php endif; ?>
	</td>
	<td width="169" valign="top">
		<span class="sub_tit_producto">C&oacute;digo:</span>
		<span class="sub_tit_producto_light"><?php echo $producto['codigo']; ?></span>
	</td>
	<td><!-- Margen --></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="7"><hr /></td>
	<td>&nbsp;</td>
</tr>