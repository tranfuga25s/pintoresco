<br />
<span class="titulos">Convenios activos</span><br />
<?php
foreach ($convenios as $convenio): ?>
	<div class="convenio">
		<?php echo $this->Html->link( '#'.h( $convenio['Convenio']['id_convenio'] ), array( 'action' => 'view', $convenio['Convenio']['id_convenio'] ), array( 'class' => 'sub_titulos') ); ?><br />
		<div class="txt_general">
			<b>Organizacion:</b>&nbsp;<?php echo h( $convenio['Organismo']['nombre'] ); ?><br />
			<b>Validez:</b>&nbsp;<?php echo date( "d/m/Y", strtotime( $convenio['Convenio']['fecha_inicio'] ) )."&nbsp;al&nbsp;".date( "d/m/Y", strtotime( $convenio['Convenio']['fecha_fin'] ) ); ?><br />
			<b>Descuento:</b>&nbsp;<?php echo h( $convenio['Convenio']['descuento'] ); ?>%<br />
			<b>Forma de pago:</b>&nbsp;<?php echo $convenio['Convenio']['forma_pago']; ?>
		</div>
		<br />
	</div>
<?php endforeach; ?>