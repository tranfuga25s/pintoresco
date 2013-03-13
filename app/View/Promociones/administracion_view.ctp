<?php $this->set( 'title_for_layout', "Ver una promoción" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar Promocion', array('action' => 'edit', $promocion['Promocion']['id_promocion']));
		  echo $this->Form->postLink( 'Eliminar promocion', array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, __('Are you sure you want to delete # %s?', $promocion['Promocion']['id_promocion']));
		  echo $this->Html->link( 'Lista de Promociones', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Nueva Promocion', array( 'action' => 'add' ) ); ?> 	
</div>
<br />
<div class="promociones view">
	<h2>Promocion</h2>
	<dl>
		<dt># Promocion:</dt>
		<dd> #<?php echo h($promocion['Promocion']['id_promocion']); ?>
			&nbsp;
		</dd>
		<dt>Titulo:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['titulo']); ?>
			&nbsp;
		</dd>
		<dt>Descripcion:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt>Imagen:</dt>
		<dd>
			<?php
			if( $promocion['Promocion']['imagen'] == null ) {
				$promocion['Promocion']['imagen'] = 'imagen_ejemplo.png';
			}  
			echo $this->Html->image( $promocion['Promocion']['imagen'], array( 'width' => 49, 'heigth' => 49 ) ); ?>
			&nbsp;
		</dd>
		<dt>Creada:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['created']); ?>
			&nbsp;
		</dd>
		<dt>Ultima modificacion:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['modified']); ?>
			&nbsp;
		</dd>
		<dt>Valido desde:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['valido_desde']); ?>
			&nbsp;
		</dd>
		<dt>Valido hasta:</dt>
		<dd>
			<?php echo h($promocion['Promocion']['valido_hasta']); ?>
			&nbsp;
		</dd>
		<dt>Publicado</dt>
		<dd>
			<?php if( $promocion['Promocion']['publicado'] ) {
				echo $this->Html->link( $this->Html->image( 'test-pass-icon.png' ), array( 'action' => 'despublicar', $promocion['Promocion']['id_promocion'] ), array( 'escape' => false ) );
			} else {
				echo $this->Html->link( $this->Html->image( 'test-fail-icon.png' ), array( 'action' => 'publicar', $promocion['Promocion']['id_promocion'] ), array( 'escape' => false ) );
			} ?>
			&nbsp;
		</dd>
	</dl>
</div>