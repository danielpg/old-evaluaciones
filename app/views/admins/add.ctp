<div class="admins cakeform view">

<h2><?php __('Nuevo'); ?></h2>

<div style="clear:both"></div>


<?php echo $this->Form->create('Admin');?>
	
		
	<?php
		echo $this->Form->input('name',array("label" => "Nombre"));
		echo $this->Form->input('email');
		echo $this->Form->input('status',["type" => "hidden" , "value" => 1]);
		echo $this->Form->input('username',array("label" => "Usuario"));
		echo $this->Form->input('password',array("label" => "Contraseña" , "type" => "text"));
		echo $this->Form->input('role_id',array("label" => "Rol","type" =>"select", "options" => array( 2 => "Evaluador")));
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

