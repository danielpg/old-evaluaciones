<div class="laboral cakeform view">

<h2><?php __('Editar Laboral'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('Laboral.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('Laboral.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Laboral');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question');
		//echo $this->Form->input('yes');
		//echo $this->Form->input('no');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

