<div id="acciones">
    <?php echo $this->Html->link( 'Lista de Superficies', array( 'action' => 'index' ) ); ?>
</div>
<br />
<div class="superficies form">
    <?php echo $this->Form->create('Superficie', array( 'type' => 'file' ) ); ?>
	<fieldset>
		<legend><h2>Agregar nueva superficie</h2></legend>
	<?php
		echo $this->Form->input('codigo', array( 'type' => 'text', 'label' => 'Código' ) );
		echo $this->Form->input('nombre');
        echo $this->Form->input('descripcion', array( 'label' => 'Introduccion', 'class' => 'ckeditor' ) );
        echo "<br />";
		echo $this->Form->input('publicado');
        echo $this->Form->input('imagen', array( 'type' => 'file' ) );
	?>
	</fieldset>
    <?php echo $this->Form->end( 'Agregar' ); ?>
</div>
