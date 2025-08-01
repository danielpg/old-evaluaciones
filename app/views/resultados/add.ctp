<div class="resultados cakeform view">

<h2><?php __('Editar Resultado'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Resultado');?>
	
		
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('exam_id');
		echo $this->Form->input('completed');
		echo $this->Form->input('vars1');
		echo $this->Form->input('vars2');
		echo $this->Form->input('vars3');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

