<?php $this->set( 'title_for_layout', "Ver especialidad" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $especialidad['Especialidad']['id_especialidad'] ) );
		  echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $especialidad['Especialidad']['id_especialidad']), null, 'Está seguro que desea eliminar esta marca?' );
		  echo $this->Html->link( 'Lista de Especialidades', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Nueva especialidad', array( 'action' => 'add' ) ); ?>
</div>
<br />
<div class="especialidad view">
<h2>Ver Especialidad</h2>
	<dl>
		<dt>N&uacute;mero de marca</dt>
		<dd>
			#<?php echo h($especialidad['Especialidad']['id_especialidad']); ?>
			&nbsp;
		</dd>
		<dt>Nombre</dt>
		<dd>
			<?php echo h($especialidad['Especialidad']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Creada</dt>
		<dd>
			<?php echo h($especialidad['Especialidad']['created']); ?>
			&nbsp;
		</dd>
		<dt>&Uacute;ltima modificaci&oacute;n</dt>
		<dd>
			<?php echo h($especialidad['Especialidad']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
<br />
<h2>Pintores con esta especialidad</h2>
<?php if( count( $especialidad['Pintor'] ) > 0 ) : ?>
<p>Los siguientes pintores tienen esta especialidad relacionada:</p>
<table>
	<tbody>
		<th>#Numero</th>
		<th>Nombre</th>
		<th>Acciones</th>
		<?php foreach( $especialidad['Pintor'] as $pintor ) : ?>
		<tr>
			<td><?php echo $pintor['num_doc']; ?></td>
			<td><?php echo $pintor['Usuario']['razonsocial']; ?></td>
			<td class="acciones"><?php echo $this->Html->link( 'Ver', array( 'controller' => 'pintores', 'action' => 'view', $pintor['id_pintor'] ) ); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script type="text/javascript">
	$("a",".acciones").button();
</script>
<?php else : ?>
<p>Esta especialidad no tiene ningun pintor asociado</p>
<?php endif; ?>
</div>