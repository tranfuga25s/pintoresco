<?php $this->set( 'title_for_layout', "Agregar material" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo Material', array( 'action' => 'add' ) ); ?>
</div>
<h2>Materiales</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_material'); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($materiales as $material): ?>
<tr>
	<td>#<?php echo h($material['Material']['id_material']); ?>&nbsp;</td>
	<td><?php echo h($material['Material']['nombre']); ?>&nbsp;</td>
	<td>
	<?php if( $material['Material']['publicado'] ) {
				echo $this->Html->link( $this->Html->image( 'test-pass-icon.png' ),
										array( "action" => "despublicar" ),
										array( "escape" => false ) );	
			} else {
				echo $this->Html->link( $this->Html->image( 'test-fail-icon.png' ),
						 				array( "action" => "despublicar" ),
						 				array( "escape" => false ) );
			}
	?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array( 'action' => 'view', $material['Material']['id_material'])); ?>
		<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $material['Material']['id_material'])); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $material['Material']['id_material']), null, 'Esta seguro que desea eliminar este material?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Paginator->counter(array( 'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} en total, desde {:start} al {:end}')));?></p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>