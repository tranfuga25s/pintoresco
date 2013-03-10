<?php $this->set( 'title_for_layout', "Listado de Promociones" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva Promocion', array( 'action' => 'add' ) ); ?>
</div>
<br />
<h2>Promociones</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort( 'titulo' ); ?></th>
		<th><?php echo $this->Paginator->sort( 'publicado', 'Publicado' ); ?></th>
		<th><?php echo $this->Paginator->sort( 'valido_desde', 'Desde' ); ?></th>
		<th><?php echo $this->Paginator->sort( 'valido_hasta', 'Hasta' ); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($promociones as $promocion): ?>
<tr>
	<td><?php echo h($promocion['Promocion']['titulo']); ?>&nbsp;</td>
	<td><?php echo h($promocion['Promocion']['publicado']); ?>&nbsp;</td>
	<td><?php echo h($promocion['Promocion']['valido_desde']); ?>&nbsp;</td>
	<td><?php echo h($promocion['Promocion']['valido_hasta']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $promocion['Promocion']['id_promocion'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $promocion['Promocion']['id_promocion'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, __('Are you sure you want to delete # %s?', $promocion['Promocion']['id_promocion'])); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count}, desde {:start} al {:end}' ) );
?>	</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>