<?php $this->set( 'title_for_layout', "Ver convenio" ); ?>
<div id="acciones">
  <?php echo $this->Html->link( 'Editar Convenio', array( 'action' => 'edit', $convenio['Convenio']['id_convenio'] ) );
		echo $this->Form->postLink( 'Eliminar Convenio', array('action' => 'delete', $convenio['Convenio']['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['Convenio']['id_convenio']));
		echo $this->Html->link( 'Lista de Convenios', array( 'action' => 'index' ) );
		echo $this->Html->link( 'Nuevo Convenio', array( 'action' => 'add' ) ); ?>	
</div>
<div class="convenios view">
	<h2>Convenio</h2>
	<dl>
		<dt>#Convenio</dt>
		<dd>
			<?php echo h($convenio['Convenio']['id_convenio']); ?>
			&nbsp;
		</dd>
		<dt>Fecha de Inicio</dt>
		<dd>
			<?php echo date( 'd/m/Y', strtorime( $convenio['Convenio']['fecha_inicio'] ) ); ?>
			&nbsp;
		</dd>
		<dt>Fecha de Fin</dt>
		<dd>
			<?php echo date( 'd/m/Y', strtorime( $convenio['Convenio']['fecha_fin']) ); ?>
			&nbsp;
		</dd>
		<dt>Documentacion</dt>
		<dd>
			<?php echo h($convenio['Convenio']['documentacion']); ?>
			&nbsp;
		</dd>
		<dt>Forma de Pago</dt>
		<dd>
			<?php echo h($convenio['Convenio']['forma_pago']); ?>
			&nbsp;
		</dd>
		<dt>Descuento</dt>
		<dd>
			<?php echo h($convenio['Convenio']['descuento']); ?>%
			&nbsp;
		</dd>
	</dl>
</div>