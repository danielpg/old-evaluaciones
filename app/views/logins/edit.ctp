<span class="lbutton"><a href="#" onclick="javascript:history.back(1);return false;">Regresar</a></span>

<div class="logins form">
<form method="post">
<?php $this->Form->create('Login');?>
	<fieldset style="width:500px" >
		<legend><?php __('Editar Admin'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('email');
		//echo $this->Form->input('nucleo_id',array("type"=>"hidden","id" => "FormAutoNucleoId"));
		//echo $this->Form->input('nucleo',array("type"=>"text","id"=>"FormAutoNucleo"));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save', true));?>
</div>
