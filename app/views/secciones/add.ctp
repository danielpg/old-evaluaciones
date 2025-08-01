<div class="secciones cakeform view">

<h2><?php __('Editar Seccion'); ?></h2>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Seccion');?>
	
		
	<?php
		echo $this->Form->input('name');
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>

