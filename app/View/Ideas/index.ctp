<?php echo $this->Html->image( 'imagen_empresa.jpg' ); ?>
<div class="titulos2">Ideas SIPP</div>
<?php foreach ($ideas as $idea): ?>
	<div class="idea">
		<span class="subtitulos"><?php echo h($idea['Idea']['titulo']); ?>&nbsp;</span>
		<div class="txt_general">
			<?php echo $idea['Idea']['contenido']; ?>			
		</div>
	</div>
<?php endforeach; ?>
<hr>
<div class="paging">
<?php echo $this->Paginator->prev( '< Anterior', array(), null, array( 'class' => 'prev disabled' ) );
	  echo $this->Paginator->numbers( array( 'separator' => ' ' ) );
	  echo $this->Paginator->next( 'Siguiente >', array(), null, array( 'class' => 'next disabled' ) ); ?>
</div>