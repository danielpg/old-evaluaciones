<div class="conductual cakeform view">

<h2><?php __('Editar Conductual'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Conductual');?>
	
		
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('tid');
		echo $this->Form->input('question');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

