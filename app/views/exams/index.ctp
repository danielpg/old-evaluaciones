<?php ?><div class="exams index">
	<h2>Tests</h2>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>Id</th>
			<th>Etiqueta</th>
			<th>Estado </th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($exams as $exam):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $exam['Exam']['id']; ?>&nbsp;</td>
		<td><?php echo $exam['Exam']['name']; ?>&nbsp;</td>
		<td><?php echo ($exam['Exam']['display']==1) ? "<b style='color:green'>Habilitado</b>" : "<b style='color:red'>Oculto</b>" ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->Html->url( array('controller' => $exam['Exam']['controller'])); ?>"><i class="fa fa-list"></i> Ver Preguntas </a>
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $exam['Exam']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>


</div>

