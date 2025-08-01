<?php 

//$lcolors = array(0,1,2,3,4,5,6,7,8,9);
$lcolors = array(0,1,2,3,4,5,6,7,8,9);

shuffle($lcolors);
$t = $lcolors;

shuffle($lcolors);
$t2 = $lcolors;

?>
<style>
.fcolor0, .fcolor1, .fcolor2,.fcolor3, .fcolor4, .fcolor5,
.fcolor6, .fcolor7, .fcolor8,.fcolor9
{width: 200px;height:185px;cursor:pointer;border:1px solid black; }

.boxframe{float:left;width: 200px;height:185px;margin-left:20px;margin-top:20px;}

.fcolor0{background:<?php echo $colors[0] ?>}
.fcolor1{background:<?php echo $colors[1] ?>}
.fcolor2{background:<?php echo $colors[2] ?>}
.fcolor3{background:<?php echo $colors[3] ?>}
.fcolor4{background:<?php echo $colors[4] ?>}
.fcolor5{background:<?php echo $colors[5] ?>}
.fcolor6{background:<?php echo $colors[6] ?>}
.fcolor7{background:<?php echo $colors[7] ?>}
.fcolor8{background:<?php echo $colors[8] ?>}
.fcolor9{background:<?php echo $colors[9] ?>}

/*
.fcolor0{background:#F0EB6D}
.fcolor1{background:#0B27A1}
.fcolor2{background:#025C43}
.fcolor3{background:#D93B0B}
.fcolor4{background:#F6D703}
.fcolor5{background:#720159}
.fcolor6{background:#903F00}
.fcolor7{background:#000000}
.fcolor8{background:#65676C}
.fcolor9{background:#FFFFFF}*/

#box_container{background:#E3F1F4;padding-left:50px}
#box_container2{background:#E3F1F4;padding-left:50px}
.modalinstucol{font-size:16px}
</style>
<script type="text/javascript">
var suma = 0;
var suma2 = 0;
var maxcolor = 10;

function fade_box(id){
	suma++;
	$('#box' + id).fadeOut();
	$("#colors").val($("#colors").val()+id+",");

}

function fade_box2(id){
	suma2++;
	$('#2box' + id).fadeOut();
	$("#colors2").val($("#colors2").val()+id+",");

}

function check_colors(){
	if(suma >= maxcolor){
		$("#cpart1").hide();
		$("#cpart2").show();
		var cnn = document.createElement("div");   // Create a <button> element
		cnn.innerHTML = "Vuelve a seleccionar los colores por orden de preferencia, NO trates conscientemente de recordar o 		repetir la selección de colores que  hiciste antes, tampoco hagas  esfuerzos por no recordarla.		Procura fijarte exclusivamente en los colores como si fuera la primera vez que los estas viendo.";  
		cnn.className = "modalinstucol"; 
		$(cnn).appendTo('body').modal({ fadeDuration: 100 });
		return true;
	}
	if(suma== (maxcolor - 1 )){
		$.notify("Falta seleccionar 1 color" , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info

	} else {
		$.notify("Falta seleccionar " + (maxcolor - suma) + " colores" , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
	}
	return false;
}
function check_colors2(){
	if(suma2 >= maxcolor){
		$("#formcolor").submit();
		return true;
	}
	if(suma2== (maxcolor - 1 )){
		$.notify("Falta seleccionar 1 color" , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
	} else {
		$.notify("Falta seleccionar " + (maxcolor - suma2) + " colores" , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
	}
	return false;
}
</script>



<div class="Preguntas index">

<h2>Test de Dinámica de la Personalidad</h2>	

<div id="cpart1">

	<div class="instrubox"><br /><b>Instrucciones:</b><br />
	Selecciona cada color por orden de preferencia.<br />
	No pienses mucho al seleccionarlos si te comprarías una prenda de vestir de ese color, simplemente ordena los colores que te llamen la atención.</div>

	<div id="box_container">
		<?php for($m = 0; $m < count($lcolors); $m++ ){
			$mclass = "";
			if(count($lcolors) == 8 && ( ($m == 0) || ($m == 4) ) ) $mclass = 'style="margin-left:80px"';
			if(count($lcolors) == 10 && ( ($m == 0) || ($m == 7) ) ) $mclass = 'style="margin-left:80px"';
			echo '<div class="boxframe" '.$mclass.'><div id="box'.$t[$m].'" class="fcolor'.$t[$m].'" onclick="javascript:fade_box('.$t[$m].');"></div></div>';
			if(count($lcolors) == 8 && $m == 3)echo '<div style="clear:both"></div>';
			if(count($lcolors) == 10 && ( ($m == 2) || ($m == 6) ) )echo '<div style="clear:both"></div>';
		} ?>
		<div style="clear:both;margin-bottom:20px"></div>
	</div>
	<div style="text-align:center;margin-top:20px"><input class="qbutton" onclick="return check_colors();" type="button" value="Continuar &raquo;" style="font-size:16px" /></div>

</div>
<div id="cpart2"  style="display:none">

	<div class="instrubox">
		<b>Instrucciones:</b><br />
		Vuelve a seleccionar los colores por orden de preferencia, NO trates conscientemente de recordar o 
		repetir la selección de colores que  hiciste antes, tampoco hagas  esfuerzos por no recordarla. 
		Procura fijarte exclusivamente en los colores como si fuera la primera vez que los estas viendo.</div>


	<div id="box_container2">
		<div class="boxframe" style="margin-left:80px"><div id="2box<?php echo $t2[0] ?>" class="fcolor<?php echo $t2[0] ?>" onclick="javascript:fade_box2('<?php echo $t2[0] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[1] ?>" class="fcolor<?php echo $t2[1] ?>" onclick="javascript:fade_box2('<?php echo $t2[1] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[2] ?>" class="fcolor<?php echo $t2[2] ?>" onclick="javascript:fade_box2('<?php echo $t2[2] ?>')"></div></div>
		<div style="clear:both"></div>
		
		<div class="boxframe"><div id="2box<?php echo $t2[3] ?>" class="fcolor<?php echo $t2[3] ?>" onclick="javascript:fade_box2('<?php echo $t2[3] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[4] ?>" class="fcolor<?php echo $t2[4] ?>" onclick="javascript:fade_box2('<?php echo $t2[4] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[5] ?>" class="fcolor<?php echo $t2[5] ?>" onclick="javascript:fade_box2('<?php echo $t2[5] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[6] ?>" class="fcolor<?php echo $t2[6] ?>" onclick="javascript:fade_box2('<?php echo $t2[6] ?>')"></div></div>
		<div style="clear:both"></div>

		<div class="boxframe" style="margin-left:80px"><div id="2box<?php echo $t2[7] ?>" class="fcolor<?php echo $t2[7] ?>" onclick="javascript:fade_box2('<?php echo $t2[7] ?>')"></div>	</div>
		<div class="boxframe"><div id="2box<?php echo $t2[8] ?>" class="fcolor<?php echo $t2[8] ?>" onclick="javascript:fade_box2('<?php echo $t2[8] ?>')"></div></div>
		<div class="boxframe"><div id="2box<?php echo $t2[9] ?>" class="fcolor<?php echo $t2[9] ?>" onclick="javascript:fade_box2('<?php echo $t2[9] ?>')"></div></div>
		<div style="clear:both;margin-bottom:20px"></div>
	</div>

	<form method="post" id="formcolor">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<input id="colors" type="hidden" name="colors" value="">
	<input id="colors2" type="hidden" name="colors2" value="">
	<input type="button" class="qbutton" value="Siguiente" onclick="check_colors2();">
	</form>

</div>








