<?php 
$this->set( 'title_for_layout', "Nuestras Promociones Disponibles" ); 
?>
<style>
.promociones .promocion {
	margin-top: 2px;
	margin-left: 4px;
	border-bottom: 1px dotted gray;
	text-align: center;
}

.promociones .promocion:nth-child {
	background-color: #66666;
}

.promociones .promocion .titulo {
	text-align: center;
	text-shadow: 1px 1px 1px #fff;
	font-size: 15px;
	color: black;
}

.promociones .promocion .contenido {
	margin-left: 3px;
}

.promociones .promocion .fechas {
	font-size: 12px;
	color: white;

}

.promociones .promocion .cont-imagen {
	float: left;
	position: inline;
	width: 150px;
	margin-right: 3px;
}
</style>
<div class="promociones index">
	<h1>¡Promociones!</h1>
	<?php
	foreach ($promociones as $promocion): ?>
	<div class="promocion">
		<h2 class="titulo"><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</h2>
		<div class="cont-imagen">
			<?php
			if( $promocion['Promocion']['imagen'] != null ) { 
				echo $this->Html->image( $promocion['Promocion']['imagen'], array( 'class' => 'imagen') );
			} else {
				echo $this->Html->image( 'imagen_ejemplo.png', array( 'class' => 'imagen' ) );
			} ?>
		</div>
		<div class="contenido"><?php echo h($promocion['Promocion']['descripcion']); ?>&nbsp;</div>
		<div class="fechas">V&aacute;lido desde <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_desde'] ) ); ?>
							hasta <?php echo date( 'd/m/Y', strtotime( $promocion['Promocion']['valido_hasta'] ) ); ?>
		</div>
		<br />
	</div>
<?php endforeach; ?>
	<p><?php echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count}, desde {:start} a {:end}' ) ); ?></p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev( '< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>