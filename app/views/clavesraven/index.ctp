<?php ?><div class="conductual index">
	<h2>Test Raven</h2>


	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>id</th>
			<th>Pregunta</th>
			<th>Respuesta</th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($clavesraven as $id => $clave):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $id ?>&nbsp;</td>
		<td><?php echo $html->image('ravenmini/cuadro'.$id.'.jpg',array("width"=>"130px")) ?></td>
		<td><?php echo $html->image('ravenmini/'.$id.$clave.'.jpg');  ?>&nbsp;</td>

		<td class="actions">
			<a rel="modal:open" href="<?php echo $this->Html->url( array('action' => 'view', $id)); ?>"><i class="fa fa-search"></i> Ver </a>  
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>


</div>

