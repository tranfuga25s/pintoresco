<?php $this->set( 'title_for_layout', "Listado de convenios" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo convenio', array('action' => 'add'));
		  echo $this->Html->link( 'Listado de Organismos', array( 'controller' => 'organismos', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Convenios</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_convenio', '#' ); ?></th>
		<th><?php echo $this->Paginator->sort('organismo_id'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
		<th><?php echo $this->Paginator->sort('descuento'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($convenios as $convenio): ?>
<tr>
	<td><?php echo h($convenio['Convenio']['id_convenio'] ); ?>&nbsp;</td>
	<td><?php echo $this->Html->link( h($convenio['Organismo']['nombre']), array( 'controller' => 'organismos', 'action' => 'view', $convenio['Organismo']['id_organismo'] ) ); ?>&nbsp;</td>
	<td><?php echo h($convenio['Convenio']['fecha_inicio']); ?>&nbsp;</td>
	<td><?php echo h($convenio['Convenio']['fecha_fin']); ?>&nbsp;</td>
	<td><?php echo h($convenio['Convenio']['descuento']); ?>%&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $convenio['Convenio']['id_convenio'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $convenio['Convenio']['id_convenio'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar' , array('action' => 'delete', $convenio['Convenio']['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['Convenio']['id_convenio'] ) ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} total, desde {:start} al {:end}')); ?></p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled') );
?>
</div>