<div class="Companys index">
	<h2><?php __('Restore');?></h2>	
	<table cellpadding="0" cellspacing="0"  class="thh" >
	<tr>
			<th>Account</th>
			<th>Metric</th>
			<th>Created</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	//var_dump($companies);
	foreach ($Restore as $Company):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $Company['Account']['name']; ?>&nbsp;</td>
		<td><?php echo $Company['Metric']['name']; ?>&nbsp;</td>
		<td><?php echo $Company['Restore']['created']; ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $Company['Restore']['id'],"?"=>array("company_id" => $Company['Restore']['id'])), null, sprintf(__('Are you sure to delete # %s?', true), $Company['Restore']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


</div>

