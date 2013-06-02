<?php

?>
<div id="acciones">
    <?php echo $this->Html->link( 'Nueva Superficie', array( 'action' => 'add' ) ); ?>
</div>
<br />
<br />
<div class="superficies index">
	<h2>Superficies</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('codigo', 'Código' ); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php foreach ($superficies as $superficie): ?>
	<tr>
		<td><?php echo h($superficie['Superficie']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['nombre']); ?>&nbsp;</td>
		<td><?php if( $superficie['Superficie']['publicado'] ) {
                echo $this->Html->link( $this->Html->image( 'test-pass-icon.png' ),
                                        array( "action" => "despublicar" ),
                                        array( "escape" => false ) );
            } else {
                echo $this->Html->link( $this->Html->image( 'test-fail-icon.png' ),
                                        array( "action" => "despublicar" ),
                                        array( "escape" => false ) );
            }
            ?>&nbsp;
        </td>
		<td class="actions">
			<?php echo $this->Html->link( 'Ver', array('action' => 'view', $superficie['Superficie']['id_superficie'])); ?>
			<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $superficie['Superficie']['id_superficie'])); ?>
			<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $superficie['Superficie']['id_superficie']), null, 'Está seguro que desea eliminar # %s?', $superficie['Superficie']['id_superficie'] ); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p><?php echo $this->Paginator->counter( array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, desde {:start} hasta {:end}' ) ); ?></p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
