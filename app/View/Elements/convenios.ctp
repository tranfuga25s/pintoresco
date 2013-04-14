<table width="211" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="211" height="26" valign="top" class="tit_convenios">CONVENIOS</td>
      </tr>
      <tr>
        <td height="16" valign="top" class="borde_tabla">&nbsp;</td>
      </tr>

		<?php
		$data = $this->requestAction( array( 'controller' => 'convenios', 'action' => 'frontend' ) );
		if( count( $data ) > 0 ) {
			foreach( $data as $convenio ) { ?>
	      <tr>
	        <td height="31" valign="top" class="convnios">
	        	<?php echo h( $convenio['Convenio']['titulo'] ); ?>
	          	<br />
	          	<span class="descuento">
	          	<?php echo h( $convenio['Convenio']['descuento'].'% desc. en '.$convenio['Convenio']['destino'] ); ?>
	          	</span>
	        </td>
	      </tr>
	      <tr><td height="16" valign="top" class="borde_tabla">&nbsp;</td></tr>
      <?php } } ?>
      <tr>
		    <td height="17" align="right" valign="middle">
		      	<?php echo $this->Html->link( $this->Html->image( "ver_mas.png", array( "name" => "Image7", "width" => 65, "height" => 17, "border" => 0, "id" => "Image7" ) ),
		  	     						array( 'controller' => 'convenios', 'action' => 'index' ),
		        						array( "onmouseout" => "MM_swapImgRestore()", "onmouseover" => "MM_swapImage( 'Image7', '', ".Router::url( '/img/ver_mas_hover.png' ).",1)", 'escape' => false ) ); ?>
		    </td>
	  </tr>

</table>