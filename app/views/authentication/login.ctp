<?php ?>
<div style="padding:20px;border-radius:0px;text-align:center;">
<form  action="<?php echo $html->url(array('controller'=>'authentication','action'=>'login')) ?>" id="ajax_login" method="post" onsubmit="javascript:submitForm('#ajax_login');return false;">
	
	<div id="login_errors" style="display:none"></div>
	
	<div style="display: inline-block;width:400px;text-align:center;background:white;padding:20px;border-radius:12px">
	<span class="login_label">Correo Electrònico</span><br/>
	<input xstyle="ime-mode: disabled;" autocomplete="off"  type="text" name="data[User][email]" xstyle="width:140px;padding:2px" /><br/>

	<!--input type="hidden" name="data[Login][remember_me]" value="0" />
	<input type="checkbox" name="data[Login][remember_me]" value="1"/><span class="login_label"><?php __("Remember me") ?></span><br/-->

	<div style="">
		<input type="submit" name="" value="Ingresar"  style="margin-top:15px;padding:8px;padding-right:20px;padding-left:20px;border-radius:4px;color:white;background:#408eda" />
	</div>
	</div>


	<div class="yatienes"><a href="<?php echo $html->url(array('controller'=>'authentication','action'=>'register')) ?>">Si No tienes cuenta, registrate aqui!</a></div>

</form>
</div>
