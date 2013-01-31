<?php $this->set( 'title_for_layout', "¿Con quien pinto?" ); ?>
<h2>¿Con quien pinto?</h2>
Ordenar por: 
<?php echo $this->Paginator->sort('razonsocial', 'Razon Social' ). "&nbsp;" .
 	  	   $this->Paginator->sort('email', 'Email' ). "&nbsp;" .
	       $this->Paginator->sort('disponibilidad' ). "&nbsp;" .
		   $this->Paginator->sort('puntos' ); ?>

<?php foreach ($pintores as $pintor ): ?>
	<div class="pintor" style="border: 1px solid dotted;">
		<h4><?php echo $this->Html->link( h($pintor['Usuario']['razonsocial'] ), array( 'action' => 'view', $pintor['Pintor']['id_pintor'] ) ); ?>&nbsp;</h4>
		<b>Cantidad de obras visibles:</b>&nbsp;<?php echo h( count( $pintor['Obra'] ) ); ?><br />
		<b>Disponibilidad:</b>&nbsp;<?php echo h( $pintor['Pintor']['horario'] ); ?>
		<br />
		<b>Especialidades:</b>&nbsp;
		<?php $espc = array(); foreach( $pintor['Especialidad'] as $esp ): $espc[] = $esp['nombre']; endforeach; echo implode( ', ', $espc ); ?>
		
	</div>
<?php endforeach; ?>
<p>
<?php echo $this->Paginator->counter(array( 'format' => 'Pagina {:page} de {:pages}, mostrando {:current} de {:count} en total, empezando desde {:start}, terminando en	 {:end}' ) ); ?>	</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< previa', array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next( 'siguiente >', array(), null, array('class' => 'next disabled'));
?>
</div>
<div>
	<h3>Ya estoy inscripto. ¿Como cambio mis datos?</h3>
	<?php echo $this->Html->link( 'Haga click aquí para cambiar sus datos', array( 'controller' => 'pintores', 'action' => 'verPintor' ) ); ?>
</div>