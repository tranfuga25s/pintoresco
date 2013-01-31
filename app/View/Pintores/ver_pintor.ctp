<?php $this->set( 'title_for_layout', "Datos de un pintor" ); ?>
<h1><?php echo h($pintor['Usuario']['razonsocial'] ); ?></h1>
<div style="float: left; width: 150px; height: 150px; border: 1px solid black; margin-right: 4px;">
	Imagen del pintor?
</div>
<h3>Datos de contacto</h3>
<b>Teléfonos:</b>&nbsp;<?php echo h( $pintor['Usuario']['telefono'] )."&nbsp;-&nbsp;".h($pintor['Usuario']['celular'] ); ?><br />
<b>Email:</b>&nbsp;<?php echo $this->Html->link( 'Enviar correo electrónico', 'mailto:'.$pintor['Usuario']['email'] ); ?><br />
<b>Horario de contacto:</b>&nbsp;<?php echo h( $pintor['Pintor']['horario'] ); ?><br />
<?php echo $this->Html->link( 'Cambiar', array( 'controller' => 'pintores', 'action' => 'edit', $pintor['Pintor']['id_pintor'] ) ); ?>
<br />
<h3>Usted se especializa en:</h4>
<?php
foreach( $pintor['Especialidad'] as $esp ) :
	echo $esp['nombre'].'<br />';
endforeach; ?>
<?php echo $this->Html->link( 'Cambiar', array( 'controller' => 'pintores', 'action' => 'edit', $pintor['Pintor']['id_pintor'] ) ); ?>	
<h3>Referencias</h3>
<br />
<small>Usted no puede cambiar este dato</small>
<?php echo h( $pintor['Pintor']['referencias'] ); ?>
<h2>Obras realizadas</h2>
<?php foreach( $pintor['Obra'] as $obra ) : ?>
	<div class="obra">
		<b>Fecha de realizacion:</b>&nbsp;<?php echo date( 'F-Y', strtotime($obra['fecha']) ); ?><br />
		<?php echo h( $obra['descripcion'] ); ?><br /> 
		<?php echo $this->Html->link( 'Modificar Obra', array( 'controller' => 'obra', 'action' => 'edit', $obra['id_obra' ] ) ); ?>
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
<?php echo $this->Html->link( 'Agregar nueva obra', array( 'controller' => 'obras', 'action' => 'add', 'pintor' => $pintor['Pintor']['id_pintor'] ) ); ?>
<br />
<br />