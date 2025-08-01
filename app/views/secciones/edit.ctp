<div class="secciones cakeform view">

<h2><?php __('Editar Seccion'); ?></h2>

<div style="clear:both"></div>


<?php echo $this->Form->create('Seccion');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

