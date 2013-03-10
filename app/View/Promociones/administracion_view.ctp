<?php $this->set( 'title_for_layout', "Ver una promoción" ); ?>
<div class="promociones view">
<h2><?php  echo __('Promocione'); ?></h2>
	<dl>
		<dt><?php echo __('Id Promocion'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['id_promocion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['imagen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valido Desde'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['valido_desde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valido Hasta'); ?></dt>
		<dd>
			<?php echo h($promocion['Promocion']['valido_hasta']); ?>
			&nbsp;
		</dd>
		<dt>Publicado</dt>
		<dd>
			<?php echo h($promocion['Promocion']['publicado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promocione'), array('action' => 'edit', $promocion['Promocion']['id_promocion'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promocione'), array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, __('Are you sure you want to delete # %s?', $promocion['Promocion']['id_promocion'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocione'), array('action' => 'add')); ?> </li>
	</ul>
</div>
