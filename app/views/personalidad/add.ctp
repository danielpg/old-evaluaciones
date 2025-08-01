<div class="personalidad cakeform view">

<h2><?php __('Add Personalidad'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Listado Personalidad', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Personalidad');?>
	
		
	<?php
		echo $this->Form->input('question');
		echo $this->Form->input('yes');
		echo $this->Form->input('no');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

