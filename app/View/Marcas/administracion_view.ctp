<?php $this->set( 'title_for_layout', "Ver marca" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar', array( 'action' => 'edit', $marca['Marca']['id_marca'] ) );
		  echo $this->Form->postLink( 'Eliminar', array( 'action' => 'delete', $marca['Marca']['id_marca']), null, 'Está seguro que desea eliminar esta marca?' );
		  echo $this->Html->link( 'Lista de Marcas', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Nueva Marca', array( 'action' => 'add' ) ); ?>
</div>
<br />
<div class="marcas view">
<h2>Ver Marca</h2>
	<dl>
		<dt>N&uacute;mero de marca</dt>
		<dd>
			#<?php echo h($marca['Marca']['id_marca']); ?>
			&nbsp;
		</dd>
		<dt>Nombre</dt>
		<dd>
			<?php echo h($marca['Marca']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Direcci&oacute;n Web</dt>
		<dd>
			<?php echo $this->Html->link( h($marca['Marca']['url']), $marca['Marca']['url'] ); ?>
			&nbsp;
		</dd>
		<dt>Publicado</dt>
		<dd>
			<?php if( $marca['Marca']['publicado'] ) {
				echo $this->Html->link( 'Si', array( 'action' => 'despublicar', $marca['Marca']['id_marca'] ) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'publicar', $marca['Marca']['id_marca'] ) );
			} ?>
			&nbsp;
		</dd>
		<dt>Creada</dt>
		<dd>
			<?php echo h($marca['Marca']['created']); ?>
			&nbsp;
		</dd>
		<dt>&Uacute;ltima modificaci&oacute;n</dt>
		<dd>
			<?php echo h($marca['Marca']['modified']); ?>
			&nbsp;
		</dd>
		<dt>Logotipo</dt>
		<dd>
			<?php
			if( !is_null( $marca['Marca']['logo'] ) ) { 
				echo $this->Html->image( $marca['Marca']['logo'] , array( 'border' => 0 ) );
			} ?>
			&nbsp;
		</dd>
	</dl>
</div>