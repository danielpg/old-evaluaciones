<div class="conductual index">
	<h2><?php echo $testname ?></h2>


	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('tid');?></th>
			<th><?php echo $this->Paginator->sort('question');?></th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($conductual as $conductual):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $conductual['Conductual']['id']; ?>&nbsp;</td>
		<td><?php echo $conductual['Conductual']['type']; ?>&nbsp;</td>
		<td><?php echo $conductual['Conductual']['tid']; ?>&nbsp;</td>
		<td><?php echo $conductual['Conductual']['question']; ?>&nbsp;</td>

		<td class="actions">
	
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $conductual['Conductual']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  

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

