<?php
$this->set( 'title_for_layout', "Editar una superficie" );
?>
<div id="acciones">
    <?php echo $this->Form->postLink( 'Eliminar esta superficie', array('action' => 'delete', $this->Form->value('Superficie.id_superficie')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Superficie.id_superficie')));
          echo $this->Html->link( 'Lista de Superficies', array('action' => 'index')); ?>
</div>
<br />
<div class="superficies form">
<?php echo $this->Form->create('Superficie', array( 'type' => 'file' ) ); ?>
	<fieldset>
		<legend><h2>Editar superficie</h2></legend>
	<?php
		echo $this->Form->input('id_superficie');
		echo $this->Form->input('codigo',array('type'=>'text'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('publicado');
        echo $this->Form->input('imagen',array('type'=>'file'));
	?>
	</fieldset>
    <?php echo $this->Form->end( 'Guardar'); ?>
</div>

