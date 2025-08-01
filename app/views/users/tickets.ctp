<?php ?><div class="users cakeform view">

	<h2>Usuario Ticket</h2>
	<div style="clear:both"></div>


	<form method="post">
		
		<table>
		<?php foreach($exams as $exid => $exname){
			if(isset($completed[$exid]))continue;
		 ?>
		<tr><td><?php echo $exname ?></td><td><div class="tisel">
			<input type="hidden" name="ticket[]" id="ticket<?php echo $exid ?>"  value="<?php if(isset($tickets[$exid]))echo $exid ?>">
			<div class="ticl <?php if(isset($tickets[$exid]))echo "tib" ?>" onclick="selticket(this,<?php echo $exid ?>,<?php echo $exid ?>);">Habilitado</div><div class="ticr <?php if(!isset($tickets[$exid]))echo "tir" ?>" onclick="selticket(this,<?php echo $exid ?>,0);">No disponible</div>
			</div></td></tr>
		<?php }	?>
		</table>

		<div style="margin:20px;color:white;background:#06568E;padding:5px;font-weight:bold;font-size:14px">Examenes Completados</div>
			
			<table>
			<?php foreach($exams as $exid => $exname){
				if(!isset($completed[$exid]))continue;
			 ?>
			<tr><td><?php echo $exname ?></td><td><div class="tisel">
				<input type="hidden" name="ticket[]" id="ticket<?php echo $exid ?>"  value="<?php if(isset($tickets[$exid]))echo $exid ?>">
				<div class="ticl <?php if(isset($tickets[$exid]))echo "tib" ?>" onclick="cselticket(this,<?php echo $exid ?>,<?php echo $exid ?>);">Repetir</div><div class="ticr <?php if(!isset($tickets[$exid]))echo "tir tig" ?>" onclick="cselticket(this,<?php echo $exid ?>,0);">Completado</div>
				</div></td></tr>
			<?php }	?>
			</table>	
	
		
	<div class="submit"><input type="submit" value="Enviar"></div>


	</form>

</div>
<script type="text/javascript">
function selticket(obj,id,val){
	$("#ticket" + id).val(val);
	$(obj).parent().find("div").removeClass("tib").removeClass("tir").removeClass("tig");
	if(val > 0)$(obj).addClass("tib");
	else $(obj).addClass("tir");
}

function cselticket(obj,id,val){
	$("#ticket" + id).val(val);
	$(obj).parent().find("div").removeClass("tib").removeClass("tir").removeClass("tig");
	if(val > 0)$(obj).addClass("tib");
	else $(obj).addClass("tig");
}


</script>


<style>
.tisel{}
.tisel div{display:inline-block;padding:8px;cursor:pointer;font-weight:600}
.tisel .ticl{border-top-left-radius:5px;border-bottom-left-radius:5px;background-color: #f6f6f6;border:1px solid #ddd;color:#333}
.tisel .ticr{border-top-right-radius:5px;border-bottom-right-radius:5px;background-color: #f6f6f6;border:1px solid #ddd;color:#333}
.tisel .tib{background:#3388CC;border:1px solid #3388CC;color:white}
.tisel .tir{background:#AE2828;;border:1px solid #AE2828;;color:white}
.tisel .tig{background:#4A9D12;;border:1px solid #4A9D12;;color:white}
</style>
