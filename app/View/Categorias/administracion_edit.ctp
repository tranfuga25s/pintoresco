<?php $this->set( 'title_for_layout', "Editar categoría" ); ?>
<div id="acciones">
	<?php 	echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Categoria.id_categoria')), null, 'Está seguro que desea eliminar esta categoría?');
			echo $this->Html->link( 'Lista de Categorias', array( 'action' => 'index' ) );
			echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><h2>Editar Categoria</h2></legend>
	<?php
		echo $this->Form->input('id_categoria');
		echo $this->Form->input('parent_id', array( 'label' => 'Categoría Padre', 'options' => $padres, 'empty' => 'Ninguna' ) );
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('publicado');
		echo $this->Form->input('descripcion', array( 'class' => 'ckeditor' ) );
		
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' ); ?>
</div>