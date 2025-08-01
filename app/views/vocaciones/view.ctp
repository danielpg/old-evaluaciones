<?php ?><div class="vocaciones view">



<h2><?php  __('Vocacion');?></h2>


<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Editar', array('action' => 'edit', $vocacion['Vocacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index')); ?> </li>
	</ul>
</div>
<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vocacion['Vocacion']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vocacion['Vocacion']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vocacion['Vocacion']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

