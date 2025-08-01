<?php 

//$secciones[""] = "Todo";
?><div class="tepetes index">

<style>
.tpt_actions select{display:inline;width:180px !important } 
</style>

<?php echo $alaxosForm->create('Tepete', array('controller' => 'tepete','url' => $this->passedArgs)); ?>

	<h2><?php echo $testname ?></h2>

	<div class="tpt_actions" style="width:300px;float:right">
	<?php    echo $this->AlaxosForm->filter_field('seccion_id',array("type"=>"select","options"=>$secciones,"empty" => array("" => "Mostrar Todo")));     ?><span class="submit"><input type="submit" value="Filtrar" /></span>
	</div>

	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('signo');?></th>
			<th><?php echo $this->Paginator->sort('seccion_id');?></th>
			<th>Pregunta</th>
			<th>Clave</th>
			<th>Puntaje</th>

			
			<th class="actions">Acciones</th>
	</tr>

	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($tepetes as $tepete):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tepete['Tepete']['id']; ?>&nbsp;</td>
		<td><?php echo ($tepete['Tepete']['signo'] == TPT_POSITIVO) ? "POS"  :  "<b style='color:Red'>NEG</b>"; ?>&nbsp;</td>
		<td><?php echo $secciones[$tepete['Tepete']['seccion_id']]; ?>&nbsp;</td>
		<td><?php echo $tepete['Tepete']['question']; ?>&nbsp;</td>
		<td><?php echo $tepete['Tepete']['clave']; ?>&nbsp;</td>
		<td><?php echo $tepete['Tepete']['puntaje']; ?>&nbsp;</td>

		<td class="actions">
			<a href="<?php echo $this->Html->url( array('action' => 'edit', $tepete['Tepete']['id'])); ?>"><i class="fa fa-pencil"></i> Editar </a>  
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

</form>

</div>

