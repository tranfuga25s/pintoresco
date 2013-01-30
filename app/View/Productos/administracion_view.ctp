<?php $this->set( 'title_for_layout', "Ver detalles de un producto" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar este producto', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) );
		  echo $this->Form->postLink( 'Eliminar este producto', array( 'action' => 'delete', $producto['Producto']['id_producto'] ), null, 'Está seguro que desea eliminar este producto?' );
		  echo $this->Html->link( 'Lista de Productos', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Marcas', array( 'controller' => 'marcas', 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Categorias', array( 'controller' => 'categorias', 'action' => 'index' ) ); ?>
</div>
<br />
<div class="productos view">
	<h2>Detalles del Producto</h2>
	<dl>
		<dt>#Codigo del producto:</dt>
		<dd>
			<?php echo h($producto['Producto']['id_producto']); ?>
			&nbsp;
		</dd>
		<dt>Nombre:</dt>
		<dd>
			<?php echo h($producto['Producto']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Marca:</dt>
		<dd>
			<?php echo $this->Html->link($producto['Marca']['nombre'], array( 'controller' => 'marcas', 'action' => 'view', $producto['Marca']['id_marca'] ) ); ?>
			&nbsp;
		</dd>
		<dt>Categoria:</dt>
		<dd>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array( 'controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id_categoria'] ) ); ?>
			&nbsp;
		</dd>
		<dt>Fecha de creacion:</dt>
		<dd>
			<?php echo h($producto['Producto']['created']); ?>
			&nbsp;
		</dd>
		<dt>Fecha de ultima modificacion:</dt>
		<dd>
			<?php echo h($producto['Producto']['modified']); ?>
			&nbsp;
		</dd>
		<dt>Publicado:</dt>
		<dd>
			<?php echo h($producto['Producto']['publicado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>