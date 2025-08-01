<?php ?>
<div class="Preguntas index">

<h2>Evaluación conductual de la Personalidad</h2>	

	<div class="instrubox"><br /><b>Instrucciones:</b><br />A continuación tienes una lista de actividades o experiencias 
	de la vida diaria, marca la letra A,B,C o D de acuerdo a como se siente o actua a cada pregunta.<br /><br />

	A = Nunca<br>
	B = A veces<br>
	C = Muchas veces<br>
	D = Siempre<br>
</div>

	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<table cellpadding="0" cellspacing="0"  class="thh" >
	
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($condus as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$qid = $Pregunta['Conductual']['id'];
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Conductual']['id']; ?>&nbsp;</td>
		<td><?php echo $Pregunta['Conductual']['question']; ?>&nbsp;</td>
		<td class="actions" style="width:210px">
			<label onclick="highlight(this)" for="button<?php echo $qid ?>1"><input name="p<?php echo $qid ?>" type="radio" id="button<?php echo $qid ?>1"  value="0">A</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>2"><input name="p<?php echo $qid ?>" type="radio"  id="button<?php echo $qid ?>2" value="1">B</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>3"><input name="p<?php echo $qid ?>"  type="radio" id="button<?php echo $qid ?>3" value="2">C</label>
			<label onclick="highlight(this)" for="button<?php echo $qid ?>4"><input name="p<?php echo $qid ?>" type="radio" id="button<?php echo $qid ?>4" value="3">D</label>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="footbu"><input type="submit" class="qbutton" onclick="return tpt_radio_validation(this,<?php echo count($condus) ?>);" value="Terminar Test"></div>
	</form>
</div>

