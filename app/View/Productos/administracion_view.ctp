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
			<?php echo h($producto['Producto']['codigo']); ?>
			&nbsp;
		</dd>
		<dt>Nombre:</dt>
		<dd>
			<?php echo h($producto['Producto']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Descripcion:</dt>
		<dd>
			<?php echo $producto['Producto']['descripcion']; ?>
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
		<dt>Presentación:</dt>
		<dd>
			<?php echo $producto['Producto']['presentacion']; ?>
			&nbsp;
		</dd>
		<dt>Rendimiento:</dt>
		<dd>
			<?php echo $producto['Producto']['rendimiento']; ?>
			&nbsp;
		</dd>
		<dt>Colores:</dt>
		<dd>
			<?php echo $producto['Producto']['colores']; ?>
			&nbsp;
		</dd>
		<dt>Imagen:</dt>
		<dd>
			<?php
			if( $producto['Producto']['imagen'] != null ) {
				echo $this->Html->image( $producto['Producto']['imagen'], array( 'width' => 100 ) );
			} else {
				echo $this->Html->image( Configure::read( 'Configuracion.imagen_producto_predeterminada' ), array( 'width' => 100, 'border' => 1 ) );
			} ?>
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
<h3>Materiales</h3>
<div>
	<?php if( count( $producto['Material'] ) > 0 ) { ?>
		<table>
			<tbody>
				<th>C&oacute;digo</th>
				<th>Nombre</th>
				<th>Acciones</th>
				<?php foreach( $producto['Material'] as $material ) : ?>
				<tr>
					<td><?php echo h($material['codigo_g'] ); ?></td>
					<td><?php echo h($material['nombre'] ); ?></td>
					<td><?php echo $this->Html->link( 'Sacar vinculo', array( 'action' => 'desvincular', 'material' => $material['id_material'], 'producto' => $producto['Producto']['id_producto'] ), array( 'class' => 'action' ) ); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php } else {
		echo "No hay materiales definidas para este producto.";
	} ?>
	<?php echo $this->Html->link( 'Agregar Material a este producto', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) ); ?>
</div>
<h3>Superficies</h3>
<div>
    <?php if( count( $producto['Superficie'] ) > 0 ) { ?>
        <table>
            <tbody>
                <th>C&oacute;digo</th>
                <th>Nombre</th>
                <th>Acciones</th>
                <?php foreach( $producto['Superficie'] as $material ) : ?>
                <tr>
                    <td><?php echo h($superficie['codigo'] ); ?></td>
                    <td><?php echo h($superficie['nombre'] ); ?></td>
                    <td><?php echo $this->Html->link( 'Sacar vinculo', array( 'action' => 'desvincular', 'superficie' => $superficie['id_superficie'], 'producto' => $producto['Producto']['id_producto'] ), array( 'class' => 'action' ) ); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else {
        echo "No hay superficies definidas para este producto.";
    } ?>
    <?php echo $this->Html->link( 'Agregar Superficie a este producto', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) ); ?>
</div>
<br />
<script> $(function(){$(".action").button();}); </script>