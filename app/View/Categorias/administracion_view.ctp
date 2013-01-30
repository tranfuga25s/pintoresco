<?php $this->set( 'title_for_layout', "Detalles de la categoría ".$categoria['Categoria']['nombre'] ); ?>
<div id="acciones">
	<?php 	echo $this->Html->link( 'Editar esta categoria', array( 'action' => 'edit', $categoria['Categoria']['id_categoria'] ) );
			echo $this->Form->postLink( 'Eliminar esta Categoria', array( 'action' => 'delete', $categoria['Categoria']['id_categoria']), null, 'Está seguro que desea eliminar esta categoría' );
			echo $this->Html->link( 'Lista de Categorias', array( 'action' => 'index' ) );
			echo $this->Html->link( 'Nueva Categoria', array( 'action' => 'add' ) );
			echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<div class="categorias view">
<h1>Categoria</h1>
	<dl>
		<dt># Categoria:</dt>
		<dd>
			<?php echo h($categoria['Categoria']['id_categoria']); ?>
			&nbsp;
		</dd>
		<dt>Categoria Padre:</dt>
		<dd>
			<?php echo $this->Html->link($categoria['Padre']['nombre'], array('controller' => 'categorias', 'action' => 'view', $categoria['Padre']['id_categoria'])); ?>
			&nbsp;
		</dd>		
		<dt>Nombre:</dt>
		<dd>
			<?php echo h($categoria['Categoria']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Descripcion:</dt>
		<dd>
			<?php echo h($categoria['Categoria']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt>Publicado:</dt>
		<dd>
			<?php if( $categoria['Categoria']['publicado'] ) {
				echo $this->Html->link( 'Si', array( 'action' => 'deshabilitar', $categoria['Categoria']['id_categoria'] ) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'habilitar', $categoria['Categoria']['id_categoria'] ) );
			}
			?>
			&nbsp;
		</dd>
		<dt>Creación:</dt>
		<dd>
			<?php echo h($categoria['Categoria']['created']); ?>
			&nbsp;
		</dd>
		<dt>Ultima Modificacion:</dt>
		<dd>
			<?php echo h($categoria['Categoria']['modified']); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<br />
<div class="related">
	<h2>Categorías Hijas</h2>
	<?php if (!empty($categoria['Hijos'])) { ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>#Categoria</th>
		<th>Nombre</th>
		<th>Publicado</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Hijos'] as $hijos): ?>
		<tr>
			<td><?php echo '#'.$hijos['id_categoria']; ?></td>
			<td><?php echo h($hijos['nombre']); ?></td>
			<td><?php
				if( $hijos['publicado'] ) {
					echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
											array( 'action' => 'deshabilitar', $hijos['id_categoria'] ),
											array( 'escape' => false ) );
				} else {
					echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
											array( 'action' => 'habilitar', $hijos['id_categoria'] ),
											array( 'escape' => false ) );
				}
				?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link( 'Ver', array( 'controller' => 'categorias', 'action' => 'view', $hijos['id_categoria'])); ?>
				<?php echo $this->Html->link( 'Editar', array( 'controller' => 'categorias', 'action' => 'edit', $hijos['id_categoria'])); ?>
				<?php echo $this->Form->postLink( 'Eliminar', array( 'controller' => 'categorias', 'action' => 'delete', $hijos['id_categoria']), null, 'Esta seguro que desea eliminar esta categoria'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php } else {
	echo h( "No hay categorías hijas definidas" );
	} ?>
</div>
<br />
<div class="related">
	<h2>Productos en esta categoría</h2>
	<?php if (!empty($categoria['Productos'])) { ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>#Producto</th>
		<th>Nombre</th>
		<th>Marca</th>
		<th>Publicado</th>
		<th class="actions">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Productos'] as $productos): ?>
		<tr>
			<td><?php echo '#'.$productos['id_producto']; ?></td>
			<td><?php echo h( $productos['nombre'] ); ?></td>
			<td><?php echo $this->Html->link( h( 'ver' ), array( 'controller' => 'marcas', 'action' => 'view', $productos['marca_id'] ) ); ?></td>
			<td><?php
				if( $productos['publicado'] ) {
					echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
											array( 'action' => 'deshabilitar', $productos['id_producto'] ),
											array( 'escape' => false ) );
				} else {
					echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
											array( 'action' => 'habilitar', $productos['id_producto'] ),
											array( 'escape' => false ) );
				}
				?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link( 'Ver', array('controller' => 'productos', 'action' => 'view', $productos['id_producto'])); ?>
				<?php echo $this->Html->link( 'Editar', array('controller' => 'productos', 'action' => 'edit', $productos['id_producto'])); ?>
				<?php echo $this->Form->postLink( 'Eliminar', array('controller' => 'productos', 'action' => 'delete', $productos['id_producto']), null, 'Está seguro que desea eliminar este producto?'  ); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php } else {
		echo h("No hay productos definidos en esta categoría");
	  } ?>
</div>
