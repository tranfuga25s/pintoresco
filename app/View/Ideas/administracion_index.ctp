<?php
$this->set( 'title_for_layout', "Administrar Ideas" );

?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva Idea', array( 'action' => 'add' ) ); ?>
</div>
<br />
<h2>Ideas SIPP</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('titulo'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php foreach ($ideas as $idea): ?>
<tr>
	<td><?php echo h($idea['Idea']['titulo']); ?>&nbsp;</td>
	<td><?php 
		if( $idea['Idea']['publicado'] ) {
			echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
									array( 'action' => 'deshabilitar', $idea['Idea']['id_idea'] ),
									array( 'escape' => false ) );
		} else {
			echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
									array( 'action' => 'habilitar', $idea['Idea']['id_idea'] ),
									array( 'escape' => false ) );
		}
		?>&nbsp;
	</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array( 'action' => 'view', $idea['Idea']['id_idea'] ) ); ?>
		<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $idea['Idea']['id_idea'] ) ); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $idea['Idea']['id_idea'] ), null, 'Esta seguro que desea eliminar esta idea?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Paginator->counter(array('format' => 'Pagina {:page} de {:pages}, mostrano {:current} de {:count} total, desde {:start} hasta {:end}')); ?>	</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>