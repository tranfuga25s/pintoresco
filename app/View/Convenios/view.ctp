<div class="convenios view">
<h2><?php  echo __('Convenio'); ?></h2>
	<dl>
		<dt><?php echo __('Id Convenio'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['id_convenio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['fecha_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Documentacion'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['documentacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pago'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['forma_pago']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descuento'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['descuento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Convenio'), array('action' => 'edit', $convenio['Convenio']['id_convenio'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Convenio'), array('action' => 'delete', $convenio['Convenio']['id_convenio']), null, __('Are you sure you want to delete # %s?', $convenio['Convenio']['id_convenio'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('action' => 'add')); ?> </li>
	</ul>
</div>
