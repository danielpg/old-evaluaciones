<div class="resultados index">
	<h2><?php __('Resultados');?></h2>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('exam_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($resultados as $resultado):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		
		<td><?php echo $resultado['User']['name']; ?>&nbsp;</td>
		<td><?php echo $resultado['Exam']['name']; ?>&nbsp;</td>
		<td><?php echo $html->simdate($resultado['Resultado']['created']); ?>&nbsp;</td>
		<td class="actions">
			<a rel="modal:open" href="<?php echo $this->Html->url( array('action' => 'view', $resultado['Resultado']['id'])); ?>"><i class="fa fa-search"></i> Ver Puntaje </a>  
			<!--a href="<?php echo $this->Html->url( array('action' => 'delete', $resultado['Resultado']['id'])); ?>" onclick="return_confirm('Estas seguro de eliminar #% $resultado['Resultado']['id']?"><i class="fa fa-trash-o"></i> Eliminar </a-->  
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

