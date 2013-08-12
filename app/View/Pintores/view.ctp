<?php
$this->pageTitle = "Viendo el pintor: ".$pintor['Usuario']['razonsocial'];
?>
<div  style="margin-left:20px;">
<br />
<span class="titulos">Datos del pintor</span><br />
<br />
<!-- <div style="float: left; width: 150px; height: 150px; border: 1px solid black; margin-left: 20px; margin-right:20px;">
	Imagen del pintor?
</div> -->
<div style="float: right; margin-right:20px;">
    <?php echo $this->Html->image( 'img_quien_pinto2.png', array( 'border' => 0 ) ); ?>
</div>
<div class="txt_general">
	<b>Razón social:</b>&nbsp;<?php echo h($pintor['Usuario']['razonsocial'] ); ?>
	<h3>Datos de contacto</h3>
	<b>Teléfonos:</b>&nbsp;<?php echo h( $pintor['Usuario']['telefono'] )."&nbsp;-&nbsp;".h($pintor['Usuario']['celular'] ); ?><br />
	<b>Email:</b>&nbsp;<?php echo $this->Html->link( 'Enviar correo electrónico', 'mailto:'.$pintor['Usuario']['email'] ); ?><br />
	<b>Horario de contacto:</b>&nbsp;<?php echo h( $pintor['Pintor']['horario'] ); ?><br />
	<br />
</div>
<span class="sub_titulos" >Se especializa en:</span><br />
<?php
foreach( $pintor['Especialidad'] as $esp ) :
	echo $esp['nombre'].'<br />';
endforeach; ?>
<br />
<span class="sub_titulos">Referencias:</span><br />
<br />
<?php echo $pintor['Pintor']['referencias']; ?>
<br />
<span class="sub_titulos">Obras realizadas</span><br />
<?php foreach( $pintor['Obra'] as $obra ) : ?>
	<div class="obra">
		<b>Fecha de realizacion:</b>&nbsp;<?php echo date( 'F-Y', strtotime($obra['fecha']) ); ?><br />
		<?php echo h( $obra['descripcion'] ); ?>
		<?php
		if( count( $obra['FotosObra'] ) > 0 ) {
			$contador = 0;
			while( $contador < 3 && $contador < count( $obra['FotosObra'] ) ) {
				echo "<div class=\"foto\">";
				echo $this->Html->image( 'obras'.DS.$obra['FotosObra'][$contador]['dir'].DS.$obra['FotosObra'][$contador]['path'], array( 'border' => 0, 'width' => 150, 'alt' => $obra['FotosObra'][$contador]['titulo'] ) );
				echo "</div>";
				$contador = $contador+1;
			}
		}
		?>
	</div>
<?php endforeach; ?>
<br />
<?php echo $this->Html->link( 'Ver otros pintores', array( 'action' => 'index' ) ); ?>
</div>