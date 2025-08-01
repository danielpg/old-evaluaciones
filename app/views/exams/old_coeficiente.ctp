<form id="coform" method="post">
<?php
for($jk = 1; $jk < 31 ; $jk++){
$cquestion = $jk;
$outp = "<div id='cofbox".$jk."' style='display:none'>";
$outp .= "<div style='text-align:center'>".$html->image('coeficiente/cuadro'.$cquestion.'.jpg')."</div>";
//$outp ='<img src="img/coeficiente/cuadro'.$cquestion.'.jpg" ><br />'."\n";
$outp .='<table width="100%">'."\n";
if($cquestion < 8) $nroimg = 7;
else $nroimg = 9;

if($cquestion >15){
	$question_answers = array();
	$question_answers[16] = 6;
	$question_answers[17] = 8;
	$question_answers[18] = 8;
	$question_answers[19] = 8;
	$question_answers[20] = 6;
	$question_answers[21] = 8;
	$question_answers[22] = 6;
	$question_answers[23] = 8;
	$question_answers[24] = 8;
	$question_answers[25] = 6;
	$question_answers[26] = 6;
	$question_answers[27] = 8;
	$question_answers[28] = 8;
	$question_answers[29] = 8;
	$question_answers[30] = 6;
	$nroimg = $question_answers[$cquestion] + 1;
}

$ref2 = "";
for($i=1;$i<$nroimg;$i++){
	if(($i==1)or($i==($nroimg-1)/2+1)) $ref = '<tr>';
	if(($i==($nroimg-1)/2)or($i==($nroimg-1))) $ref2 = '</tr>';
	//$outp .= $ref.'<td><input type="radio" name="answer" value="'.$i.'" id="button'.$i.'" onclick="highlight(this)"><label for="button'.$i.'"><img src="img/coeficiente/'.$cquestion.$i.'.jpg" ></label></td>'.$ref2."\n";
	$outp .= $ref.'<td><label for="button'.$jk.$i.'"  onclick="cofhighlight(this)"><input type="radio" name="p'.$cquestion.'" value="'.$i.'" id="button'.$jk.$i.'">';
	$outp .= $html->image('coeficiente/'.$cquestion.$i.'.jpg');
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
		if(cofstep == 31){
			$("#coform").submit();
		} else {
			$("#cofbox" + cofstep).show();
		}
	}
}

$("#cofbox1").show();

</script>






