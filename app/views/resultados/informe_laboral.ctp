<?php ?>
<!--table style="font-size:12px">
<tr>
	<td><b>Nombre</b></td>
	<td width="150px"><? php echo $datosp['nombre'].' '.$datosp['apellido'] ?></td>
	
	<td><b>Edad</b></td>
	<td width="100px"><? php echo $age." / ".$datosp['sexo'] ?></td>
	
	<td><b>Instrucci&oacute;n</b></td>
	<td><? php echo $datosp['instruccion'] ?></td>
</tr>	
<tr>
	<td><b>Email</b></td>
	<td><? php echo $datosp['email'] ?></td>
	
	<td><b>&nbsp;</b></td>
	<td>&nbsp;</td>
	
	<td><b>Profesi&oacute;n</b></td>
	<td><? php echo $datosp['profesion'] ?></td>
</tr>
<tr>
	<td><b>C&oacute;digo</b></td>
	<td><? php echo $datosp['generado'] ?></td>
	
	<td><b>Estado</b></td>
	<td><? php echo $datosp['estado'] ?></td>
	
	<td><b>Actv. Actual</b></td>
	<td><? php echo $datosp['actividad'] ?></td>
</tr>	
</table-->	


<h5>1. Perfil General</h5>

<table cellpadding="2" cellspacing="0" class="puntajes" >
	<tr>
		<td width="200px"  align='center' >&nbsp;</td>
		<td width="100px" align='center'  >Baja</td>
		<td width="100px" align='center'  >Media</td>
		<td width="100px" align='center' >Alta</td>
	</tr>
	<?php foreach($dimen as $label => $value): 
		if($label == "act_pro"){
			echo "<tr><td><h5><b>2. Analisis Dimensional</b></h5></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		}
	
		if($label == "est_emo"):
			if($value >= 10){
				$bg = "red";
				if($chart_type==1)$bg = "<td align='center'>&#9679;</td><td>&nbsp;</td><td>&nbsp;</td>";
			} elseif($value < 10 && $value > 4){
				$bg = "blue";
				if($chart_type==1)$bg = "<td>&nbsp;</td><td align='center' >&#9679;</td><td>&nbsp;</td>";
			} else {
				$bg = "green";
				if($chart_type==1)$bg = "<td>&nbsp;</td><td>&nbsp;</td><td align='center' >&#9679;</td>";
			}	
			$value = (10 - $value) + 10;
			//$value = $value*4;
		else:
			if($value <= 12){
				$bg = "red";
				if($chart_type==1)$bg = "<td align='center' >&#9679;</td><td>&nbsp;</td><td>&nbsp;</td>";
			} elseif($value >12 && $value < 17){
				$bg = "blue";
				if($chart_type==1)$bg = "<td>&nbsp;</td><td align='center' >&#9679;</td><td>&nbsp;</td>";
			} else {
				$bg = "green";
				if($chart_type==1)$bg = "<td>&nbsp;</td><td>&nbsp;</td><td align='center' >&#9679;</td>";
			}
			
		endif;
		$width = $value*40 - 320;
		//$width = $value*15;
		
		if($width < 10) {
			$width  = 25;
			$value = '';
		}	
			
		if($width > 490) $width  = 490;
	?>
	<tr>
		<td width="200px" style="border-right:1px dashed #666"><?php echo $dim_label[$label] ?> </td>
		<?php if($chart_type==1): ?>
			<?php echo $bg ?>
		<?php else: ?>
		<td colspan="3">
			<div style="text-align:right;color:white;font-size:10px;height:14px;border:1px solid black;width:<?php echo $width  ?>px;background:<?php echo $bg ?>"> 
			&nbsp;<?php echo $value ?>
			</div>
		</td>
		<?php endif; ?>
		
	</tr>
	<?php endforeach; ?>
</table>

<?php //foreach($c_elegidos as $item)echo "<td align='center' style='border:1px solid #333'>".$item."</td>"; ?>
	 

  
