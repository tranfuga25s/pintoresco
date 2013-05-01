<?php 
$this->pageTitle = "Nuestras Promociones Disponibles"; 
?>
<style>
.promociones .promocion {
	margin-left: 4px;
	margin-right: 21px;
	margin-top: 15px;
	margin-bottom: 15px;
	width: 47%; 
	min-height: 75px;
	float: left;
	text-align: left;
}


.promociones .promocion .cont-imagen {
	float: left;
	position: inline;
	width: 70px;
	margin-right: 3px;
}
</style>
<?php echo $this->Html->image( 'panoramica_promociones.jpg' ); ?>
<div class="promociones index">
	<div class="titulos">¡Promociones!</div>
	<?php
	foreach ($promociones as $promocion): ?>
	<div class="promocion">
		<span class="sub_titulos"><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</span><br />
		<div class="cont-imagen">
			<?php
			if( $promocion['Promocion']['imagen'] != null && $promocion['Promocion']['imagen'] != '' ) { 
				echo $this->Html->image( 'promociones'.DS.$promocion['Promocion']['dir'].DS.$promocion['Promocion']['imagen'], array( 'class' => 'imagen', 'width' => 49, 'heigth' => 49 ) );
			} else {
				echo $this->Html->image( 'imagen_ejemplo.png', array( 'class' => 'imagen' ) );
			} ?>
		</div>
		<div class="txt_general">V&aacute;lido desde <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_desde'] ) ); ?>
							hasta <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_hasta'] ) ); ?></div>
		<br />
		<div class="txt_general"><?php echo h($promocion['Promocion']['descripcion']); ?>&nbsp;</div>
		
		

	</div>
<?php endforeach; ?>
	<div class="paging">
	<?php
		echo $this->Paginator->prev( '< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>