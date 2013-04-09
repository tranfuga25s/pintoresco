<span class="titulos">Ideas SIPP</span>
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