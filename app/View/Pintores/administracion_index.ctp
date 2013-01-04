<?php $this->set( 'title_for_layout', "Listado de pintores" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo Pintor', array('action' => 'add'));
	      echo $this->Html->link( 'Lista de Usuarios', array( 'controller' => 'grupos', 'action' => 'index' ) ); ?>
</div>
<br />
<h2>Lista de Pintores</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('orden', 'Orden' ); ?></th>
		<th><?php echo $this->Paginator->sort('puntos' ); ?></th>
		<th><?php echo $this->Paginator->sort('habilitado' ); ?></th>
		<th><?php echo $this->Paginator->sort('razonsocial', 'Razon Social' );?></th>
		<th><?php echo $this->Paginator->sort('email', 'Email' ); ?></th>		
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($pintores as $pintor ): ?>
<tr>
	<td><?php echo h( $pintor['Pintor']['orden'] ); ?></td>
	<td><?php echo h( $pintor['Pintor']['puntos'] ); ?></td>
	<td><?php
		if( $pintor['Pintor']['habilitado'] ) {
			echo $this->Html->link( $this->Html->image( 'test-pass-icon.png', array( 'alt' => 'Deshabilitar' ) ),
									array( 'action' => 'deshabilitar' ),
									array( 'escape' => false ) );
		} else {
			echo $this->Html->link( $this->Html->image( 'test-fail-icon.png', array( 'alt' => 'Habilitar' ) ),
									array( 'action' => 'habilitar' ),
									array( 'escape' => true ) );
		}
		?>
	</td>
	<td><?php echo h($pintor['Usuario']['razonsocial']); ?>&nbsp;</td>
	<td><?php echo $this->Html->link( h($pintor['Usuario']['email']), 'mailto:' . $pintor['Usuario']['email'] ); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $pintor['Pintor']['id_pintor'])); 
			  echo $this->Html->link( 'Editar', array('action' => 'edit', $pintor['Pintor']['id_pintor']));
			  if( $pintor['Pintor']['habilitado'] ) {
			  	echo $this->Html->link( 'Deshabilitar', array( 'action' => 'deshabilitar', $pintor['Pintor']['id_pintor'] ) );
			  } else {
			  	echo $this->Html->link( 'Habilitar', array( 'action' => 'habilitar', $pintor['Pintor']['id_pintor'] ) );
			  }
			  echo $this->Html->link( 'Obras', array( 'controller' => 'obras', 'action' => 'index', $pintor['Pintor']['id_pintor'] ) );
		      echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $pintor['Pintor']['id_pintor']), null, 'Está seguro que desea eliminar este pintor?' ); ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, empezando desde {:start}, terminando en	 {:end}')
));
?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< previa', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>
