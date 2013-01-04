<h1>Convenios activos</h1>

<?php
foreach ($convenios as $convenio): ?>
<div clas="convenio">
	<h2><?php echo $this->Html->link( '#'.h( $convenio['Convenio']['id_convenio'] ), array( 'action' => 'view', $convenio['Convenio']['id_convenio'] ) ); ?></h2>
	<b>Organizacion:</b>&nbsp;<?php echo h( $convenio['Organismo']['nombre'] ); ?><br />
	<b>Validez:</b>&nbsp;<?php echo h( $convenio['Convenio']['fecha_inicio'] )."·&nbsp;".h( $convenio['Convenio']['fecha_fin'] ); ?><br />
	<b>Descuento:</b>&nbsp;<?php echo h( $convenio['Convenio']['descuento'] ); ?>%<br />
	<b>Forma de pago:</b>&nbsp;<?php echo h( $convenio['Convenio']['forma_pago'] ); ?>
</div>
<?php endforeach; ?>