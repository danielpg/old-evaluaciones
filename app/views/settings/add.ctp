<div class="settings cakeform view">

<h2><?php __('Agregar Setting'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Setting');?>
	
		
	<?php
		echo $this->Form->input('exam_id',array("type" => "text"));
		echo $this->Form->input('name');
		echo $this->Form->input('value');
		echo $this->Form->input('description');
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

