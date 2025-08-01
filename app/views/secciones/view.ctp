<div class="secciones view">
<h2><?php  __('Seccion');?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Editar', array('action' => 'edit', $seccion['Seccion']['id'])); ?> </li>
		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $seccion['Seccion']['id']), null, sprintf('Are you sure you want to delete # %s?', $seccion['Seccion']['id'])); ?> </li-->
		<li><?php echo $this->Html->link('Ir a Listado', array('action' => 'index')); ?> </li>
	</ul>
</div>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $seccion['Seccion']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $seccion['Seccion']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $seccion['Seccion']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

