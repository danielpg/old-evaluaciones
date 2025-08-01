<div class="laboral view">
<h2><?php  __('Laboral');?></h2>

<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Editar, array('action' => 'edit', $laboral['Laboral']['id'])); ?> </li>
		<!--li ><?php echo $this->Html->link('Eliminar, array('action' => 'delete', $laboral['Laboral']['id']), null, sprintf('Are you sure you want to delete # %s?', $laboral['Laboral']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $laboral['Laboral']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $laboral['Laboral']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Yes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $laboral['Laboral']['yes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $laboral['Laboral']['no']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $laboral['Laboral']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

