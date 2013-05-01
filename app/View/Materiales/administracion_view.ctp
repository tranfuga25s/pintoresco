<?php $this->set( 'title_for_layout', "Ver material" ); ?>
<div id="acciones">
	<?php echo $this->Html->link( 'Editar Material', array( 'action' => 'edit', $material['Material']['id_material'] ) );
		  echo $this->Form->postLink( 'Eliminar Material', array( 'action' => 'delete', $material['Material']['id_material']), null, 'Esta seguro que desea eliminar este material?' );
		  echo $this->Html->link( 'Lista de Materiales', array( 'action' => 'index' ) );
		  echo $this->Html->link( 'Nuevo Material', array( 'action' => 'add' ) ); ?>	
</div>
<br />
<h2>Material</h2>
<dl>
	<dt>Numero de material</dt>
	<dd>
		#<?php echo h($material['Material']['id_material']); ?>
		&nbsp;
	</dd>
	<dt>Nombre</dt>
	<dd>
		<?php echo h($material['Material']['nombre']); ?>
		&nbsp;
	</dd>
	<dt>Codigo G:</dt>
	<dd>
		<?php echo h($material['Material']['codigo_g'] ); ?>
		&nbsp;
	</dd>
	<dt>Introduccion</dt>
	<dd>
		<?php echo h($material['Material']['introduccion']); ?>
		&nbsp;
	</dd>
	<dt>Creado</dt>
	<dd>
		<?php echo h($material['Material']['created']); ?>
		&nbsp;
	</dd>
	<dt>Modificado</dt>
	<dd>
		<?php echo h($material['Material']['modified']); ?>
		&nbsp;
	</dd>
	<dt>Publicado</dt>
	<dd>
		<?php if( $material['Material']['publicado'] ) {
			echo "Si";
		} else {
			echo "No";
		} ?>
		&nbsp;
	</dd>
</dl>
<br />
<h2>Productos asociados</h2>
<?php
if( count( $material['Producto'] ) > 0 ) : ?>
<p>Los siguentes productos están asociados a este material</p>
<table>
	<tbody>
		<th>#Codigo</th>
		<th>Nombre</th>
		<th>Acciones</th>
		<?php foreach( $material['Producto'] as $producto ) : ?>
		<tr>
			<td>#<?php echo $producto['codigo']; ?></td>
			<td><?php echo $producto['nombre']; ?></td>
			<td class="acciones"><?php echo $this->Html->link( 'Ver', array( 'controller' => 'productos', 'action' => 'view', $producto['id_producto'] ) ); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script type="text/javascript">
	$("a",".acciones").button();
</script>	
<?php else : ?>
<p>No existen productos asociados a este material.</p>	
<?php endif; ?>
