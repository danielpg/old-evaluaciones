<?php ?>

<style>
#umtestlist a{
display:block;
font-size:14px;
margin-bottom:10px;
text-align:left;
color:#333;
}

#umtestlist i {font-size:19px}

.hist{ border:1px solid gray}
.hist thead{ background:black;color:white;font-weight:bold;font-size:14px}
.hist tbody td{ border-bottom:1px solid gray}
</style>


<?php if(!empty($adv)): ?>
<div style="font-size:15px"><b>Usuario no habilitado</b></div>
<?php endif; ?>


<?php if(empty($exams)): ?>
<div style="font-size:14px">No se le han asignado pruebas en este momento.</div>
<?php endif; ?>

<div id="umtestlist">
<?php foreach($exams as $item ): ?>
<a href="../exams/<?php echo $item["action"] ?>"><b>[T<?php echo $item["id"] ?></b>] <?php echo $item["name"] ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>


<?php endforeach; ?>
</div>

<?php if(!empty($resultados)): ?>


<table class="hist" cellspacing=0 cellpadding=0>
<thead><tr><td colspan="3">Historico</td></tr></thead>
<tbody>
<?php foreach($resultados as $res): ?>
<tr>
<td><?php echo $defs[$res["Resultado"]["exam_id"]]["name"] ?></td>
<td>Completado</td>
<td><?php echo $html->simdate($res["Resultado"]["created"]) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php endif; ?>
