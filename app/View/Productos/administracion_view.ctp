<?php $this->set( 'title_for_layout', "Ver detalles de un producto" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar este producto', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) );
		  echo $this->Form->postLink( 'Eliminar este producto', array( 'action' => 'delete', $producto['Producto']['id_producto'] ), null, 'Está seguro que desea eliminar este producto?' );
		  echo $this->Html->link( 'Lista de Productos', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Marcas', array( 'controller' => 'marcas', 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Categorias', array( 'controller' => 'categorias', 'action' => 'index' ) );
		  echo $this->Html->link( 'Lista de Materiales/Superficies', array( 'controller' => 'materiales', 'action' => 'index' ) ); ?>
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
		<dt>Tipo:</dt>
		<dd>
			<?php echo $this->Html->link($producto['Tipo']['nombre'], array( 'controller' => 'tipo', 'action' => 'view', $producto['Tipo']['id_tipo'] ) ); ?>
			&nbsp;
		</dd>
		<dt>Fecha de creacion:</dt>
		<dd>
			<?php echo h($producto['Producto']['created']); ?>
			&nbsp;
		</dd>
		<dt>Ultima modificacion:</dt>
		<dd>
			<?php echo h($producto['Producto']['modified']); ?>
			&nbsp;
		</dd>
		<dt>Publicado:</dt>
		<dd>
			<?php if( $producto['Producto']['publicado'] ) {
				echo $this->Html->link( 'Si', array( 'action' => 'habilitar', $producto['Producto']['id_producto'] ) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'deshabilitar', $producto['Producto']['id_producto'] ) );
			} ?>
			&nbsp;
		</dd>
	</dl>
</div>
<br />
<h3>Materiales/Superficies</h3>
<div>
	<?php if( count( $producto['Material'] ) > 0 ) { ?>
		<table>
			<tbody>
				<th>#Material</th>
				<th>Nombre</th>
				<th>Publicado</th>
				<th>Acciones</th>
				<?php foreach( $producto['Material'] as $material ) : ?>
				<tr>
					<td><?php echo h($material['id_material'] ); ?></td>
					<td><?php echo h($material['nombre'] ); ?></td>
					<td><?php echo h($material['publicado'] ); ?></td>
					<td><?php echo $this->Html->link( 'Sacar vinculo', array( 'action' => 'desvincular', 'material' => $material['id_material'], 'producto' => $producto['Producto']['id_producto'] ), array( 'class' => 'action' ) ); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php } else {
		echo "No hay superficies definidas para este producto.";
	} ?>
</div>
<br />
<?php echo $this->Html->link( 'Agregar Material/Superficie a este producto', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) ); ?>
<script> $(function(){$(".action").button();}); </script>