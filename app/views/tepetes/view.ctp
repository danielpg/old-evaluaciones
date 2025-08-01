<div class="tepetes view">
<h2><?php  __('Tepete');?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Editar', array('action' => 'edit', $tepete['Tepete']['id'])); ?> </li>
		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $tepete['Tepete']['id']), null, sprintf('Are you sure you want to delete # %s?', $tepete['Tepete']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Clave'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['clave']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Puntaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['puntaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Signo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['signo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Seccion Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tepete['Tepete']['seccion_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

