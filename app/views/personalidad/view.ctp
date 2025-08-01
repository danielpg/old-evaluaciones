<div class="personalidad view">
<h2><?php  __('Personalidad');?></h2>

<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Editar, array('action' => 'edit', $personalidad['Personalidad']['id'])); ?> </li>
		<!--li><?php echo $this->Html->link('Eliminar, array('action' => 'delete', $personalidad['Personalidad']['id']), null, sprintf('Are you sure you want to delete # %s?', $personalidad['Personalidad']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $personalidad['Personalidad']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $personalidad['Personalidad']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Yes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $personalidad['Personalidad']['yes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $personalidad['Personalidad']['no']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $personalidad['Personalidad']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

