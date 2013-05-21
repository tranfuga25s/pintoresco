<?php 
$this->set( 'title_for_layout', "Muchas gracias" ); 
?>
<style>
.direcciones {
	text-align: center;
	font-size: 12px;
	font-weight: bold;
}
.direcciones a {
	color: blue;
}
</style>
<div style="vertical-align: middle; text-align: center;">
	<?php echo $this->Html->image( 'muchas_gracias.jpg' ); ?>
</div>
<div class="direcciones">
	<p>Si lo desea también puede enviarnos un e-mail a cualquiera de estas direcciones:</p>
	<?php
	$direcciones = Configure::read( 'Emails' );
	foreach( $direcciones as $direccion ) {
		echo $this->Html->link( $direccion, 'mailto:'.$direccion )."<br />";
	}
 	?>
</div>
