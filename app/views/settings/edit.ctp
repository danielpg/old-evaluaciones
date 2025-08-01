<div class="settings cakeform view">

<h2><?php __('Editar Setting'); ?></h2>

<div style="clear:both"></div>


<?php echo $this->Form->create('Setting');?>
	
		
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('exam_id');
		echo $this->Form->input('name',array("readonly" => "readonly"));
		if(strpos($this->Form->value('name'),"color_")!==false){
			echo $this->Form->input('value',array("type"=>"text"));
		} else {
			echo $this->Form->input('value');
		}

	
		//echo $this->Form->input('description');
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

<?php if(strpos($this->Form->value('name'),"color_")!==false){ ?>
<script type="text/javascript">

$("#SettingValue").spectrum({
    color: $("#SettingValue").val(), preferredFormat: "hex",
    change: function(color) {
	$("#SettingValue").val(color);
        //$("#SettingValue").text("change called: " + color.toHexString());
    }
});
</script>

<?php } ?>

<style>
.sp-preview{width: 250px;height: 200px;}
.input textarea{width:100% ;height:200px}
</style>
