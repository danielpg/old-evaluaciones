<div class="personalidad cakeform view">

<h2><?php __('Editar Personalidad'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('Personalidad.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('Personalidad.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Personalidad');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

