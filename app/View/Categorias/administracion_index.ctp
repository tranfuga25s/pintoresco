<?php $this->set( 'title_for_layout', "Categorías/Rubros" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva Categoria', array( 'action' => 'add' ) );
		  echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Categorias</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_categoria', '#Categoria'); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($categorias as $categoria): ?>
<tr>
	<td><?php echo '#'.h($categoria['Categoria']['id_categoria']); ?>&nbsp;</td>
	<td><?php echo h($categoria['Categoria']['nombre']); ?>&nbsp;</td>
	<td><?php
		if( $categoria['Categoria']['publicado'] ) {
			echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
									array( 'action' => 'deshabilitar', $categoria['Categoria']['id_categoria'] ),
									array( 'escape' => false ) );
		} else {
			echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
									array( 'action' => 'habilitar', $categoria['Categoria']['id_categoria'] ),
									array( 'escape' => false ) );
		}
		?>
	</td>
	
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array( 'action' => 'view', $categoria['Categoria']['id_categoria'] ) ); ?>
		<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $categoria['Categoria']['id_categoria'] ) ); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $categoria['Categoria']['id_categoria']), null, 'Esta seguro que desea eliminar esta categoría?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, empezando desde {:start} al {:end}' ) );
?>
</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array( 'class' => 'prev disabled' ) );
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array( 'class' => 'next disabled' ) );
?>
</div>