<?php $this->set( 'title_for_layout', "Ver organismo" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar Organismo', array('action' => 'edit', $organismo['Organismo']['id_organismo']));
		  echo $this->Form->postLink( 'Eliminar Organismo', array('action' => 'delete', $organismo['Organismo']['id_organismo']), null, __('Are you sure you want to delete # %s?', $organismo['Organismo']['id_organismo']));
		  echo $this->Html->link( 'Listado de Organismos', array('action' => 'index'));
		  echo $this->Html->link( 'Nuevo Organismo', array('action' => 'add'));
		  echo $this->Html->link( 'Lista de Convenios', array('controller' => 'convenios', 'action' => 'index'));
		  echo $this->Html->link( 'Nuevo Convenio', array('controller' => 'convenios', 'action' => 'add')); ?>
</div>
<br />
<div class="organismos view">
<h2>Organismo</h2>
	<dl>
		<dt>N&uacute;mero</dt>
		<dd>
			<?php echo '#'.h($organismo['Organismo']['id_organismo']); ?>
			&nbsp;
		</dd>
		<dt>Nombre</dt>
		<dd>
			<?php echo h($organismo['Organismo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Direcci&oacute;n</dt>
		<dd>
			<?php echo h($organismo['Organismo']['direccion']); ?>
			&nbsp;
		</dd>
		<dt>Email</dt>
		<dd>
			<?php echo h($organismo['Organismo']['email']); ?>
			&nbsp;
		</dd>
		<dt>Horarios de atenci&oacute;n</dt>
		<dd>
			<?php echo h($organismo['Organismo']['horarios']); ?>
			&nbsp;
		</dd>
		<dt>Tel&eacute;fonos</dt>
		<dd>
			<?php echo h($organismo['Organismo']['telefonos']); ?>
			&nbsp;
		</dd>
		<dt>Logo</dt>
		<dd>
			<?php //echo h($organismo['Organismo']['logo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h2>Convenios con este organismo</h2>
	<?php if (!empty($organismo['Convenio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>#Convenio</th>
		<th>Fecha de Inicio</th>
		<th>Fecha de Fin</th>
		<th>Descuento</th>
		<th class="actions">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($organismo['Convenio'] as $convenio): ?>
		<tr>
			<td><?php echo $convenio['id_convenio']; ?></td>
			<td><?php echo $convenio['fecha_inicio']; ?></td>
			<td><?php echo $convenio['fecha_fin']; ?></td>
			<td><?php echo $convenio['descuento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link( 'Ver', array('controller' => 'convenios', 'action' => 'view', $convenio['id_convenio'])); ?>
				<?php echo $this->Html->link( 'Editar', array('controller' => 'convenios', 'action' => 'edit', $convenio['id_convenio'])); ?>
				<?php echo $this->Form->postLink( 'Eliminar', array('controller' => 'convenios', 'action' => 'delete', $convenio['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['id_convenio'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
