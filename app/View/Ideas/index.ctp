<style>
.idea {
	margin-top: 2px;
	border-top: 1px solid gray;
}

.idea .titulo {
	text-align: center;
	font-size: 20px;
	text-shadow: 1px 1px 1px #fff;
	margin-top: 4px;
	margin-bottom: 4px;
}

.idea .contenido {
	margin-left: 3px;
}

.paging {
	text-align: center;
	font-size: 13px;
	font-weight: bold;
}

.paging .prev.disabled  {
	color: gray;
}

.paging .next.disabled {
	color: gray;
}
</style>
<h1>Ideas SIPP</h1>
<?php foreach ($ideas as $idea): ?>
	<div class="idea">
		<h2 class="titulo"><?php echo h($idea['Idea']['titulo']); ?>&nbsp;</h2>
		<div class="contenido">
			<?php echo $idea['Idea']['contenido']; ?>			
		</div>
	</div>
<?php endforeach; ?>
<!-- <p><?php echo $this->Paginator->counter(array('format'=>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'));	?></p> -->
<hr>
<div class="paging">
<?php echo $this->Paginator->prev( '< Anterior', array(), null, array( 'class' => 'prev disabled' ) );
	  echo $this->Paginator->numbers( array( 'separator' => ' ' ) );
	  echo $this->Paginator->next( 'Siguiente >', array(), null, array( 'class' => 'next disabled' ) ); ?>
</div>