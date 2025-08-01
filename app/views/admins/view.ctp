<div class="admins view">
<h2><?php  __('Admin');?></h2>

<div class="actions">
	<ul>
		<!--li><?php echo $this->Html->link('Editar', array('action' => 'edit', $admin['Admin']['id'])); ?> </li-->
		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $admin['Admin']['id']), null, sprintf('Are you sure you want to delete # %s?', $admin['Admin']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $admin['Admin']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $admin['Admin']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $admin['Admin']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $admin['Admin']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Role Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $admin['Admin']['role_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

