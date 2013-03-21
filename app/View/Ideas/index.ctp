<h1>Ideas SIPP</h1>
<?php foreach ($ideas as $idea): ?>
	<div class="idea">
		<h1><?php echo h($idea['Idea']['titulo']); ?>&nbsp;</h1>
		<?php echo $idea['Idea']['contenido']; ?>
	</div>
<?php endforeach; ?>
<!-- <p><?php echo $this->Paginator->counter(array('format'=>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'));	?></p> -->
<div class="paging">
<?php echo $this->Paginator->prev( '< Anterior', array(), null, array( 'class' => 'prev disabled' ) );
	  echo $this->Paginator->numbers( array( 'separator' => '' ) );
	  echo $this->Paginator->next( 'Siguiente >', array(), null, array( 'class' => 'next disabled' ) ); ?>
</div>