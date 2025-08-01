<div class="resultados index">
	<h2 style="float:left"><?php __('Resultados');?></h2>

	<div class="actions" style="float:right">

		<input type="button" class="qbutton" onclick="ver_informe();" value="Generar Informe">
	</div>
	
	<div style="clear:both"></div>

	<form>
	<table cellpadding="0" cellspacing="0" id="tinformes">
	<thead>
	<tr>
			<th>Seleccionar</th>
			<th>Nombre</th>
			<th>Test</th>
			<th>Fecha</th>
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
	<tr<?php echo $class;?> onclick="insel(this);">
		<td><input type="checkbox" name="ids[]"  value="<?php echo $resultado['Resultado']['id']; ?>" > </td>
		<td><?php echo $resultado['User']['name']; ?>&nbsp;</td>
		<td><?php echo $resultado['Exam']['name']; ?>&nbsp;</td>
		<td><?php echo $html->simdate($resultado['Resultado']['created']); ?>&nbsp;</td>
		<td class="actions">
			<!--a rel="modal:open" href="<?php echo $this->Html->url( array("controller"=> "resultados", 'action' => 'view', $resultado['Resultado']['id'])); ?>"><i class="fa fa-search"></i> Ver </a -->  
			<!--a href="<?php echo $this->Html->url( array('action' => 'delete', $resultado['Resultado']['id'])); ?>" onclick="return_confirm('Estas seguro de eliminar #% $resultado['Resultado']['id']?"><i class="fa fa-trash-o"></i> Eliminar </a-->  
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</form>

</div>
<script type="text/javascript">

function insel(obj){
	if($(obj).hasClass("isel")){
		$(obj).removeClass("isel").find("input").prop("checked",false);
	} else {
		$(obj).addClass("isel").find("input").prop("checked",true);
	}

}

function ver_informe(){
	if($('input[name="ids[]"]:checked').length > 0){
		ids = $.map($('input[name="ids[]"]:checked'), function(n, i){ return n.value; }).join(',');
		$.ajax({
		  url: "<?php echo $html->url(array("controller" => "resultados","action" => "informe")); ?>/" + ids,
		  cache: false
		})
		  .done(function( html ) {
		    $(html).appendTo('body').modal();
		  });
		
	} else {
		text = "Seleccionar Evaluaciones.";
		$.notify(text, { position:"top center",className:"error" , autoHideDelay : 5000 }); 
		$("#tinformes tbody tr:first-child").removeClass("altrow").addClass("hgh");
	}
}
</script>
<style>

table tbody .isel td{background:#3893e4 !important;color:white}

.hgh {
  background-color:yellow;
  animation-name:bckanim;
  animation-fill-mode:forwards;
  animation-duration:2s;
  animation-delay:0s;
}
@keyframes bckanim {
  0% {background-color:yellow }
  100% { background-color:transparent;}
}
</style>








