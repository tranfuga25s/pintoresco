<div class="fotosObras view">
<h2><?php  echo __('Fotos Obra'); ?></h2>
	<dl>
		<dt><?php echo __('Id Foto Obra'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['id_foto_obra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fotosObra['Obra']['fecha'], array('controller' => 'obras', 'action' => 'view', $fotosObra['Obra']['id_obra'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fotosObra['FotosObra']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fotos Obra'), array('action' => 'edit', $fotosObra['FotosObra']['id_foto_obra'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fotos Obra'), array('action' => 'delete', $fotosObra['FotosObra']['id_foto_obra']), null, __('Are you sure you want to delete # %s?', $fotosObra['FotosObra']['id_foto_obra'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fotos Obras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fotos Obra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
