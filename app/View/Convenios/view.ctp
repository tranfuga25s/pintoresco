<h2>Convenio</h2>
<dl>
	<dt>Numero de convenio</dt>
	<dd>
		#<?php echo h($convenio['Convenio']['id_convenio']); ?>
		&nbsp;
	</dd>
	<dt>Organismo</dt>
	<dd>
		<?php echo h( $convenio['Organismo']['nombre'] ); ?>
		&nbsp;
	</dd>
	<dt>Fecha de Inicio</dt>
	<dd>
		<?php echo date( "d/m/Y", strtotime( $convenio['Convenio']['fecha_inicio'] ) ); ?>
		&nbsp;
	</dd>
	<dt>Fecha de Finalizacion</dt>
	<dd>
		<?php echo date( "d/m/Y", strtotime( $convenio['Convenio']['fecha_fin'] ) ); ?>
		&nbsp;
	</dd>
	<dt>Documentacion a presentar</dt>
	<dd>
		<?php echo $convenio['Convenio']['documentacion']; ?>
		&nbsp;
	</dd>
	<dt>Forma de Pago</dt>
	<dd>
		<?php echo $convenio['Convenio']['forma_pago']; ?>
		&nbsp;
	</dd>
	<dt>Descuento aplicable</dt>
	<dd>
		<?php echo h($convenio['Convenio']['descuento']); ?>
		&nbsp;
	</dd>
</dl>
<?php echo $this->Html->link( 'volver', array( 'action' => 'index' ) ); ?>