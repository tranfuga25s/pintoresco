<?php $this->set( 'title_for_layout', "Editar una marca" ); ?>
<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $this->Form->value('Marca.id_marca')), null, 'Está seguro que desea eliminar esta marca?' );
		  echo $this->Html->link( 'Lista de Marcas', array( 'action' => 'index' ) ); ?>
</div>
<br />
<div class="marcas form">
<?php echo $this->Form->create('Marca', array( 'type' => 'file' ) ); ?>
	<fieldset>
		<legend><h2>Editar Marca</h2></legend>
	<?php
		echo $this->Form->input('id_marca');
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
		echo $this->Form->input('url');
		echo $this->Form->input('simulador', array( 'type' => 'text', 'after' => 'Por favor, ingrese la dirección de la pagina donde se encuentra el simulador de la marca' ) );
		echo $this->Form->input('publicado');
		if( !is_null( $this->data['Marca']['logo'] ) ) {
			echo $this->Form->input('logo', array( 'type' => 'file', 'before' => $this->Html->image( 'logos'.DS.$this->data['Marca']['dir'].DS.$this->data['Marca']['logo'], array( 'width' => 150 ) ) ) );
		} else {
			echo $this->Form->input('logo', array( 'type' => 'file' ) );
		}
	    echo $this->Form->input('dir', array( 'type' => 'hidden' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>
</div>