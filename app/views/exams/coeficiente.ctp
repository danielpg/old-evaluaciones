<?php ?>
<div class="instrubox"><br /><b>Instrucciones:</b><br />Vea la figura  grande  de la parte superior. A ella, le falta un pedazo para estar completa.
Elija cuál de las seis figuras inferiores  la completaría. Si pensó en la  central superior esta en lo correcto…. Márquela y pase a la siguiente… <b>siga rápidamente.</b> 
</div>




<form id="coform" method="post">

<input type="hidden" name="time" value="<?php echo time(); ?>" />
<?php
$answers = array(
	1 => 2,
	2 => 6,
	3 => 1,
	4 => 2,
	5 => 1,
	6 => 3,
	7 => 5,
	8 => 6,
	9 => 4,
	10 => 3,
	11 => 4,
	12 => 5
);


for($jk = 1; $jk < 13 ; $jk++){
$cquestion = $jk;
$outp = "<div id='cofbox".$jk."' style='display:none'>";
$outp .= "<div style='text-align:center'>".$html->image('ravenmini/cuadro'.$cquestion.'.jpg')."</div>";
//$outp ='<img src="img/coeficiente/cuadro'.$cquestion.'.jpg" ><br />'."\n";
$outp .='<table width="100%">'."\n";


$ref2 = "";
$nroimg = 7;
for($i=1;$i<  $nroimg;$i++){
	if(($i==1)or($i==($nroimg-1)/2+1)) $ref = '<tr>';
	if(($i==($nroimg-1)/2)or($i==($nroimg-1))) $ref2 = '</tr>';
	//$outp .= $ref.'<td><input type="radio" name="answer" value="'.$i.'" id="button'.$i.'" onclick="highlight(this)"><label for="button'.$i.'"><img src="img/coeficiente/'.$cquestion.$i.'.jpg" ></label></td>'.$ref2."\n";
	$val = 0;
	if($i == $answers[$jk])$val = 1;
	$outp .= $ref.'<td><label for="button'.$jk.$i.'"  onclick="cofhighlight(this)"><input type="radio" name="p'.$cquestion.'" value="'.$val.'" id="button'.$jk.$i.'">';
	$outp .= $html->image('ravenmini/'.$cquestion.$i.'.jpg');
	$outp .='</label></td>'.$ref2."\n";
	$ref = ''; $ref2 = '';
}

$outp .='</table></div>';
//d------------------------------
echo $outp; 
}

?>


<?php ?>
<input type="button" class="qbutton" value="Siguiente" onclick="cofnext();">
</form>
<style>
.cofsel{border:2px solid red}
#coform input[type=radio]{display:none} 
#coform label{display:block} 
</style>
<script type="text/javascript">
cofstep = 1;
function cofhighlight(obj){
$(obj).parent().parent().parent().find("label").removeClass("cofsel");
$(obj).addClass("cofsel");
}

function cofnext(){
	if($('input[name=p' + cofstep + ']:checked').val()== undefined){
		$.notify("Debes seleccionar una respuesta." , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
		return false;
	} else {
		$("#cofbox" + cofstep).hide();
		cofstep++;
		if(cofstep == 13){
			$("#coform").submit();
		} else {
			$("#cofbox" + cofstep).show();
		}
	}
}

$("#cofbox1").show();

</script>






