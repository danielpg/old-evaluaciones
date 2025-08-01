<div class="personalidad index">
	<h2><?php echo $testname ?></h2>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('question');?></th>
			<th><?php echo $this->Paginator->sort('yes');?></th>
			<th><?php echo $this->Paginator->sort('no');?></th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($personalidad as $personalidad):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $personalidad['Personalidad']['id']; ?>&nbsp;</td>
		<td><?php echo $personalidad['Personalidad']['question']; ?>&nbsp;</td>
		<td><?php echo $personalidad['Personalidad']['yes']; ?>&nbsp;</td>
		<td><?php echo $personalidad['Personalidad']['no']; ?>&nbsp;</td>
	
		<td class="actions">
			<!--a href="<?php echo $this->Html->url( array('action' => 'view', $personalidad['Personalidad']['id'])); ?>"><i class="fa fa-search"></i> Ver </a-->  
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $personalidad['Personalidad']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  
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

