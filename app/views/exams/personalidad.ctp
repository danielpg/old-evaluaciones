<?php ?>
<div class="Preguntas index">

<h2>Test de Temperamento</h2>	

<div class="instrubox"><br /><b>Instrucciones:</b><br />A continuación vas a responder algunas preguntas de la manera en que actuas o te sientes, contesta con lo primero que te acuda a la mente. Hacer click en la opción "si" o "no"<br /><br /></div>

		
	<form method="post">
	<input type="hidden" name="time" value="<?php echo time(); ?>" />
	<table cellpadding="0" cellspacing="0"  class="thh" >
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($preguntas as $Pregunta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Pregunta['Personalidad']['id']; ?>&nbsp;</td>
		<td><?php echo $Pregunta['Personalidad']['question']; ?>&nbsp;</td>
		<td class="actions" style="width:120px">

			<label for="button<?php echo $Pregunta['Personalidad']['id']; ?>1" onclick="highlight(this)">
			<input name="p<?php echo $Pregunta['Personalidad']['id']; ?>" type="radio" style="display:inline-block" value="yes" id="button<?php echo $Pregunta['Personalidad']['id']; ?>1"  >
 			Si </label>
			
			<label for="button<?php echo $Pregunta['Personalidad']['id']; ?>2" onclick="highlight(this)">
			<input name="p<?php echo $Pregunta['Personalidad']['id']; ?>" type="radio" style="display:inline"  value="no" id="button<?php echo $Pregunta['Personalidad']['id']; ?>2" >
			 No </label>


			<?php //echo $this->Html->link('View', array('action' => 'view', $Pregunta['Pregunta']['id'])); ?>
			<?php //echo $this->Html->link('Edit', array('action' => 'edit', $Pregunta['Pregunta']['id'])); ?>
			<?php //php echo $this->Html->link(__('Deleter', true), array('action' => 'delete', $Pregunta['Pregunta']['id']), null, sprintf(__('Esta seguro de querer eliminar # %s?', true), $Pregunta['Pregunta']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>

	<div class='footbu'><input type="submit" class="qbutton" onclick="return radio_validation(this,57);" value="Terminar Test"></div>

	</form>


</div>

