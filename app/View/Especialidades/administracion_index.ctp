<?php $this->set( 'title_for_layout', "Listado de especialidades" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva especialidad', array('action' => 'add')); ?>
</div>
<br />
<h1>Especialidades</h1>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($especialidades as $especialidad ): ?>
<tr>
	<td><?php echo h($especialidad['Especialidad']['nombre']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $especialidad['Especialidad']['id_especialidad'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $especialidad['Especialidad']['id_especialidad'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $especialidad['Especialidad']['id_especialidad']), null, 'Está seguro que desea eliminar esta especialidad?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Pagina {:page} de {:pages}, mostrando {:current} de {:count} total, desde {:start} al {:end}')
));
?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>