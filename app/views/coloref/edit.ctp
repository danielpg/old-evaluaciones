<div class="coloref cakeform view">

<h2><?php __('Editar Coloref'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('Coloref.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('Coloref.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Coloref');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code', array('readonly' => 'readonly'));
		echo $this->Form->input('name');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

