<?php ?><div class="Preguntas index">

	<h2>Cuestionario de la Personalidad </h2>	

	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<table cellpadding="0" cellspacing="0"  class="thh" >
	
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($secks as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Eynseck']['id']; ?>&nbsp;</td>
		<td><?php echo $Pregunta['Eynseck']['question']; ?>&nbsp;</td>
		<td class="actions" style="width:120px">
			<label onclick="highlight(this)" for="button<?php echo $Pregunta['Eynseck']['id']; ?>1"><input name="p<?php echo $Pregunta['Eynseck']['id']; ?>" type="radio" style="display:inline-block" value="yes" id="button<?php echo $Pregunta['Eynseck']['id']; ?>1"  > Si </label>
			<label onclick="highlight(this)" for="button<?php echo $Pregunta['Eynseck']['id']; ?>2"><input name="p<?php echo $Pregunta['Eynseck']['id']; ?>" type="radio" style="display:inline"  value="no" id="button<?php echo $Pregunta['Eynseck']['id']; ?>2" > No </label>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<div class="footbu"><input class="qbutton" type="submit" onclick="return radio_validation(this,<?php echo count($secks) ?>);" value="Terminar Test"></div>
	</form>
</div>
