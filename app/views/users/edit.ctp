<div class="users cakeform view">

<h2><?php __('Editar User'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('User.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('User.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('User');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('approved');
		echo $this->Form->input('status');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('gender');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

