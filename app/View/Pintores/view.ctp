<?php $this->set( 'title_for_layout', "Viendo el pintor: ".$pintor['Usuario']['razonsocial'] ); ?>

<h1>Datos del pintor</h1>
<div style="float: left; width: 150px; height: 150px; border: 1px solid black; margin-right: 4px;">
	Imagen del pintor?
</div>
<b>Razón social:</b>&nbsp;<?php echo h($pintor['Usuario']['razonsocial'] ); ?>
<h3>Datos de contacto</h3>
<b>Teléfonos:</b>&nbsp;<?php echo h( $pintor['Usuario']['telefono'] )."&nbsp;-&nbsp;".h($pintor['Usuario']['celular'] ); ?><br />
<b>Email:</b>&nbsp;<?php echo $this->Html->link( 'Enviar correo electrónico', 'mailto:'.$pintor['Usuario']['email'] ); ?><br />
<b>Horario de contacto:</b>&nbsp;<?php echo h( $pintor['Pintor']['horario'] ); ?><br />
<br />
<h3>Se especializa en:</h4>
<?php
foreach( $pintor['Especialidad'] as $esp ) :
	echo $esp['nombre'].'<br />';
endforeach; ?>	

<h2>Obras realizadas</h2>
<?php foreach( $pintor['Obra'] as $obra ) : ?>
	<div class="obra">
		<b>Fecha de realizacion:</b>&nbsp;<?php echo date( 'F-Y', strtotime($obra['fecha']) ); ?><br />
		<?php echo h( $obra['descripcion'] ); ?>
		<?php 
		if( count( $obra['FotosObra'] ) > 0 ) {
			$contador = 0;
			while( $contador < 3 && $contador < count( $obra['FotosObra'] ) ) {
				echo "<div class=\"foto\">";
				echo $this->Html->image( $obra['FotosObra'][$contador]['FotosObra']['path'], array( 'border' => 1, 'width' => 150 ) );
				echo "</div>";
				$contador = $contador+1;
			}
		}
		?>
	</div>
<?php endforeach; ?>	
<br />
<?php echo $this->Html->link( 'Ver otros pintores', array( 'action' => 'index' ) ); ?>
