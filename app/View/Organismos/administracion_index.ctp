<?php $this->set( 'title_for_layout', "Listado de Organismos" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo organismo', array('action' => 'add'));
	      echo $this->Html->link( 'Lista de Convenios', array( 'controller' => 'convenios', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Organismos</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_organismo', '#'); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('direccion' ); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($organismos as $organismo): ?>
<tr>
	<td><?php echo h($organismo['Organismo']['id_organismo']); ?>&nbsp;</td>
	<td><?php echo h($organismo['Organismo']['nombre']); ?>&nbsp;</td>
	<td><?php echo h($organismo['Organismo']['direccion']); ?>&nbsp;</td>
	<td><?php echo h($organismo['Organismo']['email']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $organismo['Organismo']['id_organismo'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $organismo['Organismo']['id_organismo'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $organismo['Organismo']['id_organismo']), null, __('Are you sure you want to delete # %s?', $organismo['Organismo']['id_organismo'])); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, {:current} de {:count} total, desde {:start} al {:end}' ) ); ?></p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>