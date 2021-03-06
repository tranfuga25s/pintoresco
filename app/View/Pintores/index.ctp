<?php $this->set( 'title_for_layout', "¿Con quien pinto?" ); ?>
<div class="pintores_index">
		<span class="titulos">¿Con quien pinto?</span><br /><br />
		<table width="100%" border="0">
		    <tbody><tr><td>
<!--    		<span class="txt_general">Ordenar por:
    		<?php echo $this->Paginator->sort('razonsocial', 'Razon Social', array( 'class' => 'ordenar' ) ). "&nbsp; |&nbsp; " .
    		 	  	   $this->Paginator->sort('email', 'Email', array( 'class' => 'ordenar' ) ). "&nbsp; |&nbsp; " .
    			       $this->Paginator->sort('disponibilidad', 'Disponibilidad', array( 'class' => 'ordenar' ) ). "&nbsp; |&nbsp; " .
    				   $this->Paginator->sort('puntos', 'Puntaje', array( 'class' => 'ordenar' ) ); ?>
                </span> -->
    		<?php foreach ($pintores as $pintor ): ?>
    			<div class="pintor">
    				<?php echo $this->Html->link( '&#8226; '.h( $pintor['Usuario']['razonsocial'] ), array( 'action' => 'view', $pintor['Pintor']['id_pintor'] ), array( 'class' => 'sub_titulos', 'escape' => false ) ); ?>&nbsp;<br />
    				<span class="listado"><b>Cantidad de obras visibles:</b></span>&nbsp;<?php echo h( count( $pintor['Obra'] ) ); ?><br />
    				<span class="listado"><b>Disponibilidad:</b></span>&nbsp;<?php echo h( $pintor['Pintor']['horario'] ); ?>
    				<br />
    				<span class="listado"><b>Especialidades:</b></span>&nbsp;
    					<?php $espc = array(); foreach( $pintor['Especialidad'] as $esp ): $espc[] = $esp['nombre']; endforeach; echo implode( ', ', $espc ); ?>
    			</div>
    		<?php endforeach; ?>
    	</td>
    	<td width="320"><?php echo $this->Html->image( 'img_quien_pinto.png', array( 'border' => 0 ) ); ?></td>
    	</tr></tbody>
        </table>
		<div class="paging">
			<?php
			    if( $this->Paginator->hasPrev() )
				  echo $this->Paginator->prev(' < Anterior ', array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ' | '));
                if( $this->Paginator->hasNext() )
                   echo $this->Paginator->next( ' Siguiente > ', array(), null, array('class' => 'next disabled'));
			?>
		</div>
		<div class="destacado_pintores">
			<br />
			<?php echo $this->Html->link( 'Si es pintor, haga clic aquí para modificar sus datos', array( 'controller' => 'pages', 'action' => 'proximamente' ), array( 'class' => 'link-pintor' ) ); ?>
			<br /><br />
		</div>
</div>