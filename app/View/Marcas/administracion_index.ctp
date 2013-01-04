<?php $this->set( 'title_for_layout', "Listado de Marcas" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva marca', array('action' => 'add'));
	      echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<h1>Marcas</h1>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th><?php echo $this->Paginator->sort('url', 'Direccion' ); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($marcas as $marca): ?>
<tr>
	<td><?php echo h($marca['Marca']['nombre']); ?>&nbsp;</td>
	<td><?php if( $marca['Marca']['publicado'] ) {
			echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'border' => 0 ) ),
									array( 'action' => 'despublicar', $marca['Marca']['id_marca'] ),
									array( 'escape' => false ) );
		  } else {
			echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'border' => 0 ) ),
									array( 'action' => 'publicar', $marca['Marca']['id_marca'] ),
									array( 'escape' => false ) );			 
		  } 
	?></td>
	<td><?php echo $this->Html->link( h($marca['Marca']['url']), $marca['Marca']['url'] ); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $marca['Marca']['id_marca'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $marca['Marca']['id_marca'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $marca['Marca']['id_marca']), null, __('Are you sure you want to delete # %s?', $marca['Marca']['id_marca'])); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
