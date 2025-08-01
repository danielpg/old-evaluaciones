<div class="eynseck cakeform view">

<h2><?php __('Editar Eynseck'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Eynseck');?>
	
		
	<?php
		echo $this->Form->input('question');
		echo $this->Form->input('yes');
		echo $this->Form->input('no');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

