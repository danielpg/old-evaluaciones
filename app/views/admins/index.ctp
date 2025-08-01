<?php ?><div class="admins index">
	<h2>Admins</h2>

	<div class="actions" style="float:right;margin-bottom:20px">
		<a class="qbutton" href="<?php echo $this->Html->url(array('action' => 'add')); ?>"> Nuevo Evaluador</a>
	</div>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('role_id');?></th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($admins as $admin):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $admin['Admin']['id']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['name']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['username']; ?>&nbsp;</td>
		<td><?php echo ($admin['Admin']['status'] == 1) ? "<b style='color:green'>Habilitado</b>" : "<b style='color:red'>No Habilitado</b>" ?></td>
		<td><?php echo ($admin['Admin']['role_id']==1) ? "Admin" : "Evaluador"; ?>&nbsp;</td>
		<td class="actions">
			<!--a href="<?php echo $this->Html->url( array('action' => 'view', $admin['Admin']['id'])); ?>"><i class="fa fa-search"></i> Ver </a-->  
			<?php if($admin['Admin']['role_id'] != 1): ?>
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $admin['Admin']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  
			<?php endif; ?>
			<!--a href="<?php echo $this->Html->url( array('action' => 'delete', $admin['Admin']['id'])); ?>" onclick="return_confirm('Estas seguro de eliminar #% $admin['Admin']['id']?"><i class="fa fa-trash-o"></i> Eliminar </a -->  
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

