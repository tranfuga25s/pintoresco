<?php $this->set( 'title_for_layout', "Agregar nuevo producto" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Productos', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Marcas', array( 'controller' => 'marcas', 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Categorias', array( 'controller' => 'categorias', 'action' => 'index' ) ); ?>
</div>
<br />
<div class="productos form">
<?php echo $this->Form->create('Producto'); ?>
	<fieldset>
		<legend><h2>Agregar nuevo producto</h2></legend>
	<?php
		echo $this->Form->input( 'id_producto' );
		echo $this->Form->input( 'imagen', array( 'type' => 'hidden', 'value' => null ) );
		echo $this->Form->input( 'codigo' );
		echo $this->Form->input( 'nombre');
		echo $this->Form->input( 'descripcion', array( 'class' => 'ckeditor' ) );
		echo $this->Form->input( 'categoria_id');
		echo $this->Form->input( 'marca_id');
		echo $this->Form->input( 'tipo_id');
		echo $this->Form->input( 'publicado');
		echo $this->Form->input( 'presentacion', array( 'type' => 'text', 'after' => 'Ej: 1, 4, 10 lts' ) );
		echo $this->Form->input( 'rendimiento', array( 'type' => 'text', 'after' => 'Ej: 10 mts2/lts/mano' ) );
		echo $this->Form->input( 'colores', array( 'type' => 'text', 'after' => 'Ingrese una lista de colores separados por coma' ) );
		echo $this->Form->input( 'Material', array( 'options' => $materiales, 'multiple' => true, 'label' => 'Material/Superficie de aplicacion:', 'after' => 'Para seleccionar varios elementos utilice la tecla Ctrl y haga click sobre los elementos a elegir' ) );
	?>
	</fieldset>
	<?php echo $this->Form->end( 'Agregar' ); ?>
</div>