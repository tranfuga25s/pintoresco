<div class="superficies view">
<h2><?php  echo __('Superficie'); ?></h2>
	<dl>
		<dt><?php echo __('Id Superficie'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['id_superficie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicado'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['publicado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Superficie'), array('action' => 'edit', $superficie['Superficie']['id_superficie'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Superficie'), array('action' => 'delete', $superficie['Superficie']['id_superficie']), null, __('Are you sure you want to delete # %s?', $superficie['Superficie']['id_superficie'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superficie'), array('action' => 'add')); ?> </li>
	</ul>
</div>
