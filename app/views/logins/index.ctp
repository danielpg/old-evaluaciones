<div class="logins index">
	<h2><?php __('Administrators');?></h2>

	<table cellpadding="0" cellspacing="0"  class="thh" >
	<tr>
			<th><?php echo $this->Paginator->sort("Id",'id');?></th>
			<th><?php echo $this->Paginator->sort("Username",'username');?></th>
			<th><?php echo $this->Paginator->sort("Role",'role_id');?></th>
			<th class="actions"> &nbsp; </th>
	</tr>
	<?php
	$i = 0;
	foreach ($logins as $login):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $login['Login']['id']; ?>&nbsp;</td>
		<td><?php echo $login['Login']['username']; ?>&nbsp;</td>
		<td><?php echo $login['Login']['role_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link("Edit", array( 'action' => 'edit', $login['Login']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, viewing %current% rows of %count%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Back', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>




