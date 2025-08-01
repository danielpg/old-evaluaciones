<?php

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
	//$nroimg = $question_answers[$cquestion] + 1;


?>

<?php echo $html->image('ravenmini/cuadro'.$id.'.jpg',array("width"=>"380px")) ?><br>

<?php
$max = 7;
//if(isset($question_answers[$id]))$max = $question_answers[$id] + 1;

for($i = 1 ; $i < $max ;$i++){
	 echo $html->image('ravenmini/'.$id.$i.'.jpg'); 
}
?>

