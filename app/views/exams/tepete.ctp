<?php ?>
<div class="Preguntas index">

<h2>Evaluación de la Personalidad</h2>	

	<div class="instrubox"><br /><b>Instrucciones:</b><br />A continuación tienes una lista de actividades o experiencias 
	de la vida diaria, marca la letra A,B,C o D de acuerdo a como la pregunta te agrada o desagrada siguiendo el cuadro de la leyenda.<br /><br />

	A = Casi nunca<br>
	B = A veces<br>
	C = Con frequencia<br>
	D = Casi siempre<br>
</div>

	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<table cellpadding="0" cellspacing="0"  class="thh" >
	
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($tepes as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$qid = $Pregunta['Tepete']['id'];
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Tepete']['id']; ?>&nbsp;</td>
		<td><?php echo $Pregunta['Tepete']['question']; ?>&nbsp;</td>
		<td class="actions" style="width:210px">
			<label onclick="highlight(this)" for="button<?php echo $qid ?>1"><input name="p<?php echo $qid ?>" type="radio" id="button<?php echo $qid ?>1"  value="A">A</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>2"><input name="p<?php echo $qid ?>" type="radio"  id="button<?php echo $qid ?>2" value="B">B</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>3"><input name="p<?php echo $qid ?>"  type="radio" id="button<?php echo $qid ?>3" value="C">C</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>4"><input name="p<?php echo $qid ?>" type="radio" id="button<?php echo $qid ?>4" value="D">D</label>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="footbu"><input type="submit" class="qbutton" onclick="return tpt_radio_validation(this,<?php echo count($tepes) ?>);" value="Terminar Test"></div>
	</form>
</div>

