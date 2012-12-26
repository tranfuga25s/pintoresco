<?php $this->set( 'title_for_layout', "Listado de usuarios" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Nuevo Usuario', array('action' => 'add'));
	      echo $this->Html->link( 'Lista de Grupos', array('controller' => 'grupos', 'action' => 'index')); ?>
</div>
<br />
<h2>Lista de Usuarios</h2>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('email', 'Razon Social' );?></th>
		<th><?php echo $this->Paginator->sort('razonsocial', 'Razon Social' );?></th>
		<th><?php echo $this->Paginator->sort('grupo_id');?></th>
		<th class="actions">Acciones</th>
</tr>
<?php
foreach ($usuarios as $usuario): ?>
<tr>
	<td><?php echo $this->Html->link( h($usuario['Usuario']['email']), 'mailto:' . $usuario['Usuario']['email'] ); ?>&nbsp;</td>
	<td><?php echo h($usuario['Usuario']['razonsocial']); ?>&nbsp;</td>
	<td><?php echo $this->Html->link(h($usuario['Grupo']['nombre']), array('controller' => 'grupos', 'action' => 'view', $usuario['Grupo']['id_grupo'])); ?></td>
	<td class="actions">
		<?php echo $this->Html->link( 'Ver', array('action' => 'view', $usuario['Usuario']['id_usuario'])); ?>
		<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $usuario['Usuario']['id_usuario'])); ?>
		<?php echo $this->Html->link( 'Camb Contra', array( 'action' => 'cambiarContra', $usuario['Usuario']['id_usuario'] ) ); ?>
		<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $usuario['Usuario']['id_usuario']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id_usuario'])); ?>
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