<?php ?>
<div style="padding:20px;border-radius:0px;text-align:center;">
<form  action="<?php echo $html->url(array('controller'=>'authentication','action'=>'register')) ?>" id="ajax_login" method="post" onsubmit="javascript:submitForm('#ajax_login');return false;">
	
	<div id="login_errors" style="display:none"></div>
	
	<br>
	<div style="display: inline-block;width:400px;text-align:center;background:white;padding:20px;border-radius:12px">
	<span class="login_label">Nombre</span><br/>
	<input xstyle="ime-mode: disabled;" autocomplete="off"  type="text" name="data[User][name]" xstyle="width:140px;padding:2px;" />
	<br />
	<span class="login_label">Correo Electrònico</span><br/>
	<input xstyle="ime-mode: disabled;" autocomplete="off"  type="text" name="data[User][email]" xstyle="width:140px;padding:2px" /><br/>
	<span class="login_label">Sexo</span><br/>
	<select name="data[User][gender]"><option value="1">Masculino</option><option value="2">Femenino</option></select>

	<br/><span class="login_label">Edad</span><br/>
	<input name="data[User][age]" type="text">
	<br/>

	<!--input type="hidden" name="data[Login][remember_me]" value="0" />
	<input type="checkbox" name="data[Login][remember_me]" value="1"/><span class="login_label"><?php __("Remember me") ?></span><br/-->

	<div style="">
		<input type="submit" name="" value="Registrar"  style="margin-top:15px;padding:8px;padding-right:20px;padding-left:20px;border-radius:4px;color:white;background:#408eda" />
	</div>


	</div>

	<div class="yatienes"><a href="<?php echo $html->url(array('controller'=>'authentication','action'=>'login')) ?>">Si ya tienes cuenta ingresa aqui!</a></div>

</form>
</div>

