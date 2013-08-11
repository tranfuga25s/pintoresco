<?php $this->set( 'title_for_layout', "Editar obra" ); ?>
<div id="acciones">
	<?php echo $this->Form->postLink( 'Eliminar', array('action' => 'delete', $this->Form->value('Obra.id_obra')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Obra.id_obra')));
		  echo $this->Html->link( 'Lista de Obras', array('action' => 'index'));
		  echo $this->Html->link( 'Lista de Pintores', array('controller' => 'pintores', 'action' => 'index'));
		  echo $this->Html->link( 'Nueva obra', array( 'action' => 'add' ) ); ?>
</div>
<div class="obras form">
<?php echo $this->Form->create('Obra'); ?>
	<fieldset>
		<legend><h2>Datos de la obra</h2></legend>
	<?php
		echo $this->Form->input('id_obra');
		echo $this->Form->input('pintor_id', array( 'label' => 'Pintor:' ) );
		echo $this->Form->input('fecha', array( 'label' => 'Fecha de realizacion:', 'dateFormat' => 'MY' ) );
		echo $this->Form->input('descripcion', array( 'label' => 'Pequeña descripción:' ) );
	?>
	</fieldset>
	<fieldset>
		<legend><h3>Imagenes de la obra</h3></legend>
		<p>Estas son las imágenes que hay cargadas para esta obra.   <?php echo $this->Html->link( 'Agregar', array( 'controller' => 'fotos_obras', 'action' => 'index', $this->data['Obra']['id_obra'] ), array( 'class' => 'botones' ) ); ?></p>
		<?php foreach( $this->data['FotosObra'] as $foto ) : ?>
            <div class="foto">
                <?php echo $this->Html->image( 'obras'.DS.$foto['dir'].DS.$foto['path'], array( 'width' => 250 ) ); ?><br />
                <b><?php echo $foto['titulo']; ?></b><br />
                <?php echo $foto['descripcion']; ?><br />
                <?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'fotos_obras', 'action' => 'delete', $foto['id_foto_obra'] ), array( 'class' => 'botones' ), 'Esta seguro que desea eliminar esta imagen de la obra?' ); ?>
                <?php echo $this->Html->link( 'Editar', array( 'controller' => 'fotos_obras', 'action' => 'edit', $foto['id_foto_obra'] ), array( 'class' => 'botones' ) ); ?>
            </div>
		<?php endforeach; ?>
	</fieldset>
	<?php echo $this->Form->end( 'Guardar'); ?>
</div>
<?php debug( $this->data ); ?>
<script>
$( function() { $(".botones" ).button(); });
</script>