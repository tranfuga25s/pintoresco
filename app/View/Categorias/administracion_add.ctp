<?php $this->set( 'title_for_layout', "Agregar nueva categoría" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Lista de Categorias', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index')); ?>	
</div>
<br />
<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><h2>Agregar nueva categoría</h2></legend>
	<?php
		echo $this->Form->input('parent_id', array( 'label' => 'Categoría Padre:', 'empty' => 'Ninguna', 'options' => $padres ) );
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('publicado');
		echo $this->Form->input('descripcion', array( 'class' => 'ckeditor' ) );
		
		echo "<br />";
	echo $this->Form->end( 'Agregar'); ?>
	</fieldset>
</div>