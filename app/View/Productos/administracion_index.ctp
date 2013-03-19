<?php $this->set( 'title_for_layout', "Listado de productos" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo Producto', array('action' => 'add'));
		  echo $this->Html->link( 'Lista de Marcas', array('controller' => 'marcas', 'action' => 'index'));
		  echo $this->Html->link( 'Nueva Marca', array('controller' => 'marcas', 'action' => 'add'));
		  echo $this->Html->link( 'Lista de Categorias', array( 'controller' => 'categorias', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Productos</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_producto', "#Codigo"); ?></th>
		<th><?php echo $this->Paginator->sort('categoria_id', "Categoria" ); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('marca_id'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($productos as $producto): ?>
<tr>
	<td><?php echo h('#'.$producto['Producto']['codigo']); ?>&nbsp;</td>
	<td>
		<?php echo $this->Html->link( h($producto['Categoria']['nombre']), array( 'controller' => 'categoria', 'action' => 'index' ) ); ?>&nbsp;
	</td>
	<td><?php echo h($producto['Producto']['nombre']); ?>&nbsp;</td>
	<td>
		<?php echo $this->Html->link($producto['Marca']['nombre'], array('controller' => 'marcas', 'action' => 'view', $producto['Marca']['id_marca'])); ?>&nbsp;
	</td>
	<td><?php
		if( $producto['Producto']['publicado'] ) {
			echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
									array( 'action' => 'deshabilitar', $producto['Producto']['id_producto'] ),
									array( 'escape' => false ) );
		} else {
			echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
									array( 'action' => 'habilitar', $producto['Producto']['id_producto'] ),
									array( 'escape' => false ) );
		}
		?>
	</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array( 'action' => 'view', $producto['Producto']['id_producto'] ) ); ?>
		<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $producto['Producto']['id_producto'] ) ); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $producto['Producto']['id_producto'] ), null, 'Está seguro que desea eliminar este producto?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array('format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, desde {:start} al {:end}') );
?>	</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>