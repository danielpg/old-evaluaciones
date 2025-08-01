<div class="users cakeform view">

<h2><?php __('Editar Usuario'); ?></h2>
<div style="clear:both"></div>


<?php echo $this->Form->create('User');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input( 'name' , array("label" => "Nombre", "disabled" => "disabled")  );
		echo $this->Form->input('status',array("label" => "Estado",  "type" => "select" , "options" => array( USER_DISABLED => "No habilitado" , USER_ENABLED => "Habilitado" ) ) );
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

