<?php ?>
<div class="Preguntas index">

<h2>Test de Intereses Vocacionales</h2>	
<div class="instrubox"><br /><b>Instrucciones:</b><br />
A continuación tienes una lista de actividades o tareas, marca la letra A,B,C,D o E de acuerdo a como la pregunta 
te agrada o desagrada siguiendo el cuadro de la leyenda.
<br>
	A = Agrada Mucho<br>
	B = Le agrada<br>
	C = Indiferente<br>
	D = No le agrada<br>
	E = Le desagrada Mucho
</div>

	<table cellpadding="0" cellspacing="0"  class="thh" >
	
	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<?php
	$i = 0;
	foreach ($vocas as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$rid = $Pregunta['Vocacional']['id']; 
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Vocacional']['id']; ?></td>
		<td><?php echo $Pregunta['Vocacional']['question']; ?></td>
		<td class="actions" style="width:220px">
			<label for="button<?php echo $rid ?>5"  onclick="highlight(this)"><input name="p<?php echo $rid ?>" type="radio" value="5" id="button<?php echo $rid ?>5" >A</label>
			<label for="button<?php echo $rid ?>4"  onclick="highlight(this)"><input name="p<?php echo $rid ?>" type="radio"  value="4" id="button<?php echo $rid ?>4" >B</label>
			<label for="button<?php echo $rid ?>3"  onclick="highlight(this)"><input name="p<?php echo $rid ?>"  type="radio" value="3" id="button<?php echo $rid ?>3" >C</label>
			<label for="button<?php echo $rid ?>2"  onclick="highlight(this)"><input name="p<?php echo $rid ?>" type="radio"  value="2" id="button<?php echo $rid ?>2" >D</label>
			<label for="button<?php echo $rid ?>1"  onclick="highlight(this)"><input name="p<?php echo $rid ?>" type="radio"  value="1" id="button<?php echo $rid ?>1" >E</label>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<div class='footbu'><input type="submit" class="qbutton" onclick="return radio_validation(this,<?php echo count($vocas) ?>)" value="Terminar Test"></div>

	</form>

</div>

