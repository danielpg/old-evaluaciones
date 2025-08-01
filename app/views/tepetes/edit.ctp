<div class="tepetes cakeform view">

<h2><?php __('Editar TPT'); ?></h2>

<div style="clear:both"></div>


<?php echo $this->Form->create('Tepete');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question');
		//echo $this->Form->input('clave');
		//echo $this->Form->input('puntaje');
		//echo $this->Form->input('signo');
		//echo $this->Form->input('seccion_id');
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

