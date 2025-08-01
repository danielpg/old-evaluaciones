<div class="vocaciones index">
	<h2><?php __('Vocaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th>Etiqueta</th>

			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($vocaciones as $vocacion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $vocacion['Vocacion']['id']; ?>&nbsp;</td>
		<td><?php echo $vocacion['Vocacion']['name']; ?>&nbsp;</td>

		<td class="actions">
			<!--a href="<?php echo $this->Html->url(array('action' => 'view', $vocacion['Vocacion']['id'])); ?>"><i class="fa fa-search"></i> Ver </a-->
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $vocacion['Vocacion']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>
			<!--a href="<?php echo $this->Html->url( array('action' => 'edit', $vocacion['Vocacion']['id'])); ?>" onclick="return confirm('Estas seguro de eliminar #<?php echo $vocacion['Vocacion']['id'] ?>?');"><i class="fa fa-trash-o"></i> Eliminar </a-->
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . 'Atras', array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next('Siguiente' . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

