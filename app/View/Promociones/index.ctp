<?php 
$this->pageTitle = "Nuestras Promociones Disponibles"; 
?>
<style>
.promociones .promocion {
	margin-left: 4px;
	text-align: left;
	margin-top: 30px;
	margin-bottom: 20px;
}


.promociones .promocion .cont-imagen {
	float: left;
	position: inline;
	width: 150px;
	margin-right: 3px;
}
</style>
<div class="promociones index">
	<span class="titulos">¡Promociones!</span>
	<?php
	foreach ($promociones as $promocion): ?>
	<div class="promocion">
		<h2 class="sub_titulos"><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</h2>
		<div class="cont-imagen">
			<?php
			if( $promocion['Promocion']['imagen'] != null ) { 
				echo $this->Html->image( $promocion['Promocion']['imagen'], array( 'class' => 'imagen') );
			} else {
				echo $this->Html->image( 'imagen_ejemplo.png', array( 'class' => 'imagen' ) );
			} ?>
		</div>
		<div class="txt_general"><?php echo h($promocion['Promocion']['descripcion']); ?>&nbsp;</div>
		<div class="txt_general">V&aacute;lido desde <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_desde'] ) ); ?>
							hasta <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_hasta'] ) ); ?>
		</div>
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