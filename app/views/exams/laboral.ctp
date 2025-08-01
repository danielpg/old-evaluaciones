<?php ?>

<h2>Test de Aptitud Laboral</h2>	

	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />

	<table cellpadding="0" cellspacing="0"  class="thh" >
	
	
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($labos as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Laboral']['id']; ?>&nbsp;</td>
		<td><?php echo $Pregunta['Laboral']['question']; ?>&nbsp;</td>
		<td class="actions" style="width:120px">
			<label for="button<?php echo $Pregunta['Laboral']['id']; ?>1"  onclick="highlight(this)"><input name="p<?php echo $Pregunta['Laboral']['id']; ?>" type="radio" style="display:inline-block" value="yes" id="button<?php echo $Pregunta['Laboral']['id']; ?>1" > Si </label>
			
			<label for="button<?php echo $Pregunta['Laboral']['id']; ?>2"  onclick="highlight(this)"><input name="p<?php echo $Pregunta['Laboral']['id']; ?>" type="radio" style="display:inline"  value="no" id="button<?php echo $Pregunta['Laboral']['id']; ?>2"> No </label>

		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class='footbu'><input type="submit" class="qbutton" onclick="return radio_validation(this,<?php echo count($labos) ?>);" value="Terminar Test"></div>

	</form>

