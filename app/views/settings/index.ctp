<?php ?><div class="settings index">
	<h2>Configuraciòn</h2>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('exam_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th> </th>
			<th width="300px"> </th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($settings as $setting):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $setting['Setting']['exam_id']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['name']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['description']; ?>&nbsp;</td>
		<td><?php 
		if(strpos($setting['Setting']['name'],"color_")!==false){
			echo "<div style='background:".$setting[0]['trunk'].";width:200px;height:40px;'>&nbsp;</div>";
		} else{
			echo $setting[0]['trunk']."...";
		}
		?>
</td>
		<td class="actions">
			<a rel="modal:open"  href="<?php echo $this->Html->url( array('action' => 'view', $setting['Setting']['id'])); ?>"><i class="fa fa-search"></i> Ver </a>  
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $setting['Setting']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  
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

