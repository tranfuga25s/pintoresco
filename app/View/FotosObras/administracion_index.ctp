<?php 
$this->page_title = "Fotos para una obra"; 
?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Obras', array( 'controller' => 'obras', 'action' => 'index' ) );  ?>
</div>
<script>
$(function() { 
	$( "a", "#acciones2" ).button();
	$( "a", ".contenedor" ).button();
} );
</script>
<style>
.contenedor {
	border: 1px solid gray;
	padding: 3px 3px 8px 8px;
	background-color: lightgrey;
	float: left;
	margin: 2px 2px 2px 2px;
}
</style>
<br />
<div>
	<h2>Fotos para la obra #<?php echo $obra['Obra']['id_obra'].' - '.$obra['Pintor']['Usuario']['razonsocial']; ?></h2>
	<?php //debug( $fotosObras ); ?>
	<?php foreach( $fotosObras as $foto ) { ?>
		<div class="contenedor">
			<?php echo $this->Html->image( $foto['FotosObra']['path'], array( 'width' => 300 ) ); ?>
			<br />
			<?php echo h( $foto['FotosObra']['titulo'] ); ?><br />
			<?php echo h( $foto['FotosObra']['descripcion'] ); ?><br />
			<?php echo $this->Html->link( 'Eliminar', array( 'action' => 'delete', $foto['FotosObra']['id_foto_obra'], $foto['FotosObra']['obra_id']	 ) ); ?>
			<?php echo $this->Html->link( 'Cambiar datos', array( 'action' => 'edit', $foto['FotosObra']['id_foto_obra'] ) ); ?>
		</div>
	<?php } ?>
</div>
<div id="acciones2" style="clear: both;">
	<?php echo $this->Html->link( 'Agregar nueva imagen', '#', array( 'onclick' => '$("#agregar").slideDown()' ) ); ?>
</div>
<br />
<div id="agregar" style="display: none;">
	<h2>Agregar nueva imagen</h2>
	<?php echo $this->Form->create( 'FotosObra', array( 'type' => 'file', 'action' => 'add' ) ); ?>
	<fieldset>
		<legend><h3>Añadir nueva imagen</h3></legend>
	<?php
		echo $this->Form->input('obra_id', array( 'type' => 'hidden', 'value' => $obra['Obra']['id_obra'] ) );
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('path', array( 'type' => 'file', 'label' => 'Subir archivo:' ) );
		echo $this->Form->input('dir', array( 'type' => 'hidden' ) );
		echo $this->Form->end( 'Subir' );
	?>
	</fieldset>
	
</div>
