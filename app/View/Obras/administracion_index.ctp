<?php $this->set( 'title_for_layout', "Lista de obras" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nueva Obra', array( 'action' => 'add' ) );
		  echo $this->Html->link( 'Lista de Pintores', array( 'controller' => 'pintores', 'action' => 'index' ) );
		  echo $this->Html->link( 'Nuevo Pintor', array( 'controller' => 'pintores', 'action' => 'add' ) ); ?>
</div>
<br />
<?if ( isset( $pintor ) ) : ?>
<h2>Obras para el pintor <?php echo $pintor['Usuario']['razonsocial']; ?></h2>
<?php else : ?>
<h2>Obras</h2>
<?php endif; ?>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id_obra', '#'); ?></th>
		<th><?php echo $this->Paginator->sort('publicado'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha'); ?></th>
		<th><?php echo $this->Paginator->sort('pintor_id'); ?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($obras as $obra): ?>
<tr>
	<td><?php echo h($obra['Obra']['id_obra']); ?>&nbsp;</td>
	<td><?php
        if( $obra['Obra']['publicado'] ) {
            echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
                                    array( 'action' => 'despublicar', $obra['Obra']['id_obra'] ),
                                    array( 'escape' => false ) );
        } else {
            echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
                                    array( 'action' => 'publicar', $obra['Obra']['id_obra'] ),
                                    array( 'escape' => false ) );
        }
        ?>
	</td>
	<td><?php echo date( 'F Y', strtotime( $obra['Obra']['fecha'] ) ); ?>&nbsp;</td>
	<td>
		<?php echo $this->Html->link($obra['Pintor']['Usuario']['razonsocial'], array('controller' => 'pintores', 'action' => 'view', $obra['Pintor']['id_pintor'])); ?>
	</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $obra['Obra']['id_obra'], $obra['Obra']['pintor_id'] ) ); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $obra['Obra']['id_obra'], $obra['Obra']['pintor_id'] ) ); ?>
		<?php echo $this->Html->link( 'Fotos', array( 'controller' => 'fotos_obras', 'action' => 'index', $obra['Obra']['id_obra'] ) ); ?>
		<?php
		if( $obra['Obra']['publicado'] ) {
            echo $this->Html->link( 'Despublicar', array('action' => 'despublicar', $obra['Obra']['id_obra'], $obra['Obra']['pintor_id'] ) );
		} else {
            echo $this->Html->link( 'Publicar', array('action' => 'publicar', $obra['Obra']['id_obra'], $obra['Obra']['pintor_id'] ) );
		}
		?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $obra['Obra']['id_obra'], $obra['Obra']['pintor_id'] ), null, 'Esta seguro que deseo eliminar la obra?'); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php echo $this->Paginator->counter(array('format' => 'Pagina {:page} de {:pages}, {:current} de {:count} en total, desde {:start} al {:end}' ) ); ?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'Siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>