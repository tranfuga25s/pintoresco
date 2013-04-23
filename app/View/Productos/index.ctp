<table width="955" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="txt_ideas">
 <tbody>
  <tr><td height="18" colspan="6" valign="top" bgcolor="#FFFFFF"><?php echo $this->Html->image( "nada.png", array( 'width' => 154, 'height' => 18 ) ); ?></td></tr>
  <tr>
    <td height="80" colspan="6" valign="top">
    	
    	<!-- Tabla de busqueda -->
    	<?php echo $this->Form->create( 'Producto', array( 'type' => 'get' ) ); ?>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#C3C0DE" class="busqueda-productos">
    		<tbody>
		      <!--DWLayoutTable-->
		      <tr>
		        <td width="40" rowspan="3" valign="top" bgcolor="#c3c0de"></td>
		        <td width="192" height="34" valign="middle" class="tit_form">Buscar por nombre del producto</td>
		        <td width="24" rowspan="3" valign="top">&nbsp;</td>
		        <td width="188" valign="middle" class="tit_form">Buscar por Marca</td>
		        <td width="24" rowspan="3" valign="top">&nbsp;</td>
		        <td width="188" valign="middle" class="tit_form">Buscar por Tipo de Producto</td>
		        <td width="30" rowspan="3" valign="top">&nbsp;</td>
		        <td width="188" valign="middle" class="tit_form">Buscar por superficie</td>
		        <td width="47" rowspan="3" valign="top">&nbsp;</td>
		      </tr>
		      <tr>
        		<td height="22" valign="top">
        			<?php echo $this->Form->input( 'nombre', array( 'type' => 'text', 'label' => false, 'div' => false, 'value' => $nombre  ) ); ?>
        		</td>
        		<td valign="middle">
        			<?php echo $this->Form->input( 'marca_id', array( 'label' => false, 'div' => false, 'empty' => 'Elija una marca', 'value' => $marca_id ) ); ?>
        		</td>
        		<td valign="top">
        			<?php echo $this->Form->input( 'tipo_id', array( 'label' => false, 'div' => false, 'empty' => 'Elija un tipo ', 'value' => $tipo_id ) ); ?>
        		</td>
        		<td valign="top">
        			<?php echo $this->Form->input( 'superficie_id', array( 'label' => false, 'div' => false, 'empty' => 'Elija una superficie', 'value' => $superficie_id ) ); ?>
        		</td>
        		<td>
    				<?php echo $this->Form->submit( 'Buscar' ); ?>        			
        		</td>
        	</tr>
		  </tbody>
    	</table>
    	<?php echo $this->Form->end(); ?>

    	
    </td>
  </tr>
  <tr><td height="38" colspan="7" valign="top">&nbsp;</td></tr>
  <?php foreach( $productos as $producto ) {
  		echo $this->element( 'producto', array( 'producto' => $producto ) );
  	
   } ?>	
  <tr><td colspan="8" align="center">	
	<?php echo $this->Paginator->counter(array('format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, desde {:start} al {:end}') ); ?>	</p>
	<div class="paging">
	<?php
	    echo $this->Paginator->first( '<< Primero' );
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last( 'Ultimo >>' );
	?>
	</td></tr>
 </tbody>
</table>
