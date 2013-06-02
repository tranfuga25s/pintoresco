<?php
$this->set( 'title_for_layout', 'Viendo una superficie' ); ?>
<div id="acciones">
    <?php echo $this->Html->link( 'Editar esta Superficie', array( 'action' => 'edit', $superficie['Superficie']['id_superficie'] ) );
          echo $this->Form->postLink( 'Eliminar Superficie', array( 'action' => 'delete', $superficie['Superficie']['id_superficie'] ), null, 'Está seguro que desea eliminar # %s?', $superficie['Superficie']['id_superficie']);
          echo $this->Html->link( 'Lista de Superficies', array( 'action' => 'index' ) );
          echo $this->Html->link( 'Nueva Superficie', array( 'action' => 'add' ) ); ?>
</div>
<br />
<div class="superficies view">
<h2>Superficie</h2>
	<dl>
		<dt># Superficie</dt>
		<dd>
			<?php echo h($superficie['Superficie']['id_superficie']); ?>
			&nbsp;
		</dd>
		<dt>#Código</dt>
		<dd>
			<?php echo h($superficie['Superficie']['codigo']); ?>
			&nbsp;
		</dd>
		<dt>Nombre</dt>
		<dd>
			<?php echo h($superficie['Superficie']['nombre']); ?>
			&nbsp;
		</dd>
		<dt>Creado</dt>
		<dd>
			<?php echo h($superficie['Superficie']['created']); ?>
			&nbsp;
		</dd>
		<dt>Última modificación</dt>
		<dd>
			<?php echo h($superficie['Superficie']['modified']); ?>
			&nbsp;
		</dd>
		<dt>Publicado</dt>
		<dd>
			<?php if( $superficie['Superficie']['publicado'] ) {
                echo "Si";
            } else {
                echo "No";
            } ?>
			&nbsp;
		</dd>
		<dt>Imagen:</dt>
		<dd><?php if( $superficie['Superficie']['imagen'] == null ) {
		      echo $this->Html->image( 'superficie_generico.png' );
		} else {
		      echo $this->Html->image( $superficie['Superficie']['dir_imagen'].$superficie['Superficie']['imagen'] );
		} ?>
		</dd>
	</dl>
</div>
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