<?php
$this->set( 'title_for_layout', "Administrador de Tipos de productos" );
?>
<div id="acciones">
<?php echo $this->Html->link( 'Nuevo Tipo', array( 'action' => 'add' ) );
	  echo $this->Html->link( 'Lista de Productos', array( 'controller' => 'productos', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Tipos de productos</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('codigo'); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php foreach ($tipos as $tipo): ?>
<tr>
	<td>#<?php echo h($tipo['Tipo']['codigo']); ?>&nbsp;</td>
	<td><?php echo h($tipo['Tipo']['nombre']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $tipo['Tipo']['id_tipo'])); ?>
		<?php //echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $tipo['Tipo']['id_tipo']), null, __('Are you sure you want to delete # %s?', $tipo['Tipo']['id_tipo'])); ?>
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
