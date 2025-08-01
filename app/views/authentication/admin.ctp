<?php ?>
<div style="text-align:center;font-size:26px;color:white"><b>Administrador</b></div>
<style>body{background:#004830 !important}</style>
<div style="padding:20px;border-radius:0px;text-align:center;">
<form  xaction="<?php echo $html->url(array('controller'=>'authentication','action'=>'login')) ?>" id="ajax_login" method="post" xonsubmit="javascript:submitForm('#ajax_login');return false;">
	
	<div id="login_errors" style="display:none"></div>
	
	<div style="display: inline-block;width:400px;text-align:center;background:white;padding:20px;border-radius:12px">
	<span class="login_label">Usuario</span><br/>
	<input xstyle="ime-mode: disabled;" autocomplete="off"  type="text" name="data[Admin][username]" xstyle="width:140px;padding:2px" /><br/>
	<span class="login_label">Contraseña</span><br/>
	<input xstyle="ime-mode: disabled;" autocomplete="off"  type="password" name="data[Admin][password]" xstyle="width:140px;padding:2px" /><br/>
	<!--input type="hidden" name="data[Login][remember_me]" value="0" />
	<input type="checkbox" name="data[Login][remember_me]" value="1"/><span class="login_label"><?php __("Remember me") ?></span><br/-->

	<div style="">
		<input type="submit" name="" value="Ingresar"  style="margin-top:15px;padding:8px;padding-right:20px;padding-left:20px;border-radius:4px;color:white;background:#408eda" />
	</div>
	</div>

</form>
</div>
