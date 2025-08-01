<?php ?><div class="users index">
	<h2>Usuarios</h2>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('Fecha',"created");?></th>
		<th>Estado</th>
		<th>Nombre</th>
		<th>Email</th>
		<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $html->simdate($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['status'] == 1) ? "<b class='gr'>Habilitado</b>" : "<b class='rd'>No habilitado</b>"; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->Html->url( array('action' => 'exams', $user['User']['id'])); ?>"><i class="fa fa-search"></i> Ver Informe</a>  
			<a href="<?php echo $this->Html->url( array('action' => 'tickets', $user['User']['id'])); ?>"><i class="fa fa-pencil"></i> Tickets</a>  
			<!--a href="<?php echo $this->Html->url( array('action' => 'edit', $user['User']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a-->  
			<!--a href="<?php echo $this->Html->url( array('action' => 'delete', $user['User']['id'])); ?>" onclick="return_confirm('Estas seguro de eliminar #% $user['User']['id']?"><i class="fa fa-trash-o"></i> Eliminar </a-->  
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

<style>
.rd{color:red}
.gr{color:green}

</style>


