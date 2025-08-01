<span class="lbutton"><a href="#" onclick="javascript:history.back(1);return false;">Regresar</a></span>

<div class="logins form">
<form method="post">
<?php $this->Form->create('Login');?>
	<fieldset style="width:400px">
		<legend><?php __('Agregar Admin'); ?></legend>
	<?php

		echo $this->Form->input('role_id',array("label"=>"Rol", "type" => "text","value" => 1));
		echo $this->Form->input('username');
		echo $this->Form->input('flag_status' , array("type" => "hidden" , "value" => 1));
		//echo $this->Form->input('email');
		echo $this->Form->input('password',array("autocomplete"=>"off","style"=>"ime-mode: disabled;"));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Grabar', true));?>
</div>

