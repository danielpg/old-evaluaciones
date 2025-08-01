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
	foreach ($clavesraven as $raven):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $raven['Clavesraven']['id']; ?>&nbsp;</td>
		<td><?php echo $html->image('coeficiente/cuadro'.$raven['Clavesraven']['id'].'.jpg',array("width"=>"130px")) ?></td>
		<td><?php echo $html->image('coeficiente/'.$raven['Clavesraven']['id'].$raven['Clavesraven']['clave'].'.jpg');  ?>&nbsp;</td>

		<td class="actions">
			<a rel="modal:open" href="<?php echo $this->Html->url( array('action' => 'view', $raven['Clavesraven']['id'])); ?>"><i class="fa fa-search"></i> Ver </a>  
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . 'Atras', array(), null, array('class'=>'disabled'));?>
	  	<?php echo $this->Paginator->numbers();?>
 
		<?php echo $this->Paginator->next('Siguiente' . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

