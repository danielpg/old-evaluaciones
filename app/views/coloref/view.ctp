<div class="coloref view">
<h2><?php  __('Coloref');?></h2>

<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Editar, array('action' => 'edit', $coloref['Coloref']['id'])); ?> </li>
		<!--li ><?php echo $this->Html->link('Eliminar, array('action' => 'delete', $coloref['Coloref']['id']), null, sprintf('Are you sure you want to delete # %s?', $coloref['Coloref']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coloref['Coloref']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coloref['Coloref']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coloref['Coloref']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coloref['Coloref']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

