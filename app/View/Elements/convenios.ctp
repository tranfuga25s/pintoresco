<?php
$data = $this->requestAction( array( 'controller' => 'convenios', 'action' => 'frontend' ) );
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="211" height="26" valign="top" class="tit_convenios" colspan="<?php echo count($data)*2+1; ?>">CONVENIOS</td>
      </tr>
      <tr>
		<?php
		if( count( $data ) > 0 ) {
			foreach( $data as $convenio ) { ?>

	        <td height="31" valign="top" class="convnios">
	        	<?php echo $this->Html->link( h( $convenio['Convenio']['titulo'] ), array( 'controller' => 'convenios', 'action' => 'index' ) ); ?>
	          	<br />
	          	<span class="descuento">
	          	<?php echo h( $convenio['Convenio']['descuento'].'% desc. en '.$convenio['Convenio']['destino'] ); ?>
	          	</span>
	        </td>
	        <td>&nbsp;</td>
      <?php } } ?>
		    <td height="17" align="right" valign="middle">
		      	<?php echo $this->Html->link( $this->Html->image( "ver_mas.png", array( "name" => "Image7", "width" => 65, "height" => 17, "border" => 0, "id" => "Image7" ) ),
		  	     						array( 'controller' => 'convenios', 'action' => 'index' ),
		        						array( "onmouseout" => "MM_swapImgRestore()", "onmouseover" => "MM_swapImage( 'Image7', '', '".Router::url( '/img/ver_mas_invertido.png' )."',1)", 'escape' => false ) ); ?>
		    </td>
	  </tr>

</table>