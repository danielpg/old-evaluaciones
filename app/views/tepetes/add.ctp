<div class="tepetes cakeform view">

<h2><?php __('Editar Tepete'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Tepete');?>
	
		
	<?php
		echo $this->Form->input('question');
		echo $this->Form->input('clave');
		echo $this->Form->input('puntaje');
		echo $this->Form->input('signo');
		echo $this->Form->input('seccion_id');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

