<?php $cuanti = 1 ?>


<div class="modal">


<!--table  border="0" cellpadding="0" cellspacing="0" class="body_c">
<tr>
	<td align="center" width="250px"><b>Nombre</b></td>
	<td align="center" width="70px"><b>Edad</b></td>
	<td align="center" width="70px"><b>Grado</b></td>
	<td align="center" width="70px"><b>Secci&oacute;n</b></td>
	<td align="center" width="70px"><b>Turno</b></td>
	<td align="center" width="100px"><b>Codigo Web</b></td>
</tr>
<tr>

</tr>
</table-->

<h2>RESULTADOS ORIENTACION PSICOLOGICA</h2>

 <table>
	<?php if($duration > 0){ ?>
  <tr>
    <td>
	<b>Tiempo total: </b>
			<?php  
			
				if($duration < 61){
					echo $duration." segundos.";
				} else {
					$minutes = floor($duration/60);
					$secs = $duration % 60;
					echo $minutes." min. y ".$secs." segs.";
				}
			
			?>
	
</td>
  </tr>
<?php } ?>

<?php  if(isset($examen[ID_TEST_COEFICIENTE])): ?>    
  <tr>
    <td>
	<h5><?php  echo $cuanti++ ?>. <?php echo $testname[ID_TEST_COEFICIENTE] ?>    </h5>
	<div style="margin-left:15px"><?php  echo $capacidad ?></div>
</td>
  </tr>
<?php endif; ?> 

<?php  if(isset($examen[ID_TEST_PERSONALIDAD])): ?>   
  <tr>
    <td>
	<h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_PERSONALIDAD] ?></h5>
	 <div style="margin-left:15px">
	 <p><b> Temperamento:</b> <?php  echo $temperamento; ?> &nbsp;&nbsp;&nbsp;<span style="font-size:9px">(<?php  echo $personalidad_total ?>)</span></p>
		<b> Rasgos Personales:</b> 
		<?php  echo $rasgos ?>
	</div>
	</td>
  </tr>
  
  <!--tr>
    <td>
      <h5><?php // echo ($cuanti - 1) ?>.A Caracter&iacute;sticas Generales para el Estudio</h5>
      <div style="margin-left:15px"><?php  //echo $cestudios ?></div>
    </td>
  </tr-->

<?php endif; ?> 

<?php  if(isset($examen[ID_TEST_COLORES])): ?>   
  <tr>
    <td><h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_COLORES] ?></h5>
   <div style="margin-left:15px">

<?php $letters = range("A","Z");$i = 0; ?>
<table style="{border:1px solid black;padding-left:5px; padding-right:5px;font-size:12px" border="0" width="705"><tr><td>
	<?php if(isset($colores["general"])): ?>
	<b><?php echo $letters[$i++] ?>. Caracter&iacute;stica General:</b>
	<div style="margin-left:10px"><?php echo $colores["general"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["problema"])): ?>
	<b><?php echo $letters[$i++] ?>. Problema Actual:</b>
	<div style="margin-left:10px"><?php echo $colores["problema"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["orientado"])): ?>
	<b><?php echo $letters[$i++] ?>. Orientado a:</b>
	<div style="margin-left:10px"><?php echo $colores["orientado"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["presente"])): ?>
	<b><?php echo $letters[$i++] ?>. Situaci&oacute;n Presente:</b>
	<div style="margin-left:10px"><?php echo $colores["presente"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["coartada"])): ?>
	<b><?php echo $letters[$i++] ?>. Caracter&iacute;sticas Coartadas:</b>
	<div style="margin-left:10px"><?php echo $colores["coartada"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["tension"])): ?>	
	<b><?php echo $letters[$i++] ?>. Foco de tensi&oacute;n:</b>
	<div style="margin-left:10px"><?php echo $colores["tension"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["entorno"])): ?>	
	<b><?php echo $letters[$i++] ?>. Ajuste al entorno:</b>
	<div style="margin-left:10px"><?php echo $colores["entorno"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["orientacion"])): ?>	
	<b><?php echo $letters[$i++] ?>. Necesidades de Orientaci&oacute;n:</b>
	<div style="margin-left:10px"><?php echo $colores["orientacion"] ?></div>
	<?php endif; ?>
	<?php if(isset($colores["orden2"])): ?>	
	<div style="text-align:right"><span style="font-size:11px">( <?php echo implode(",",$colores["orden2"]) ?> )</span></div>
	<?php endif; ?>
</td></tr></table>



</div>
   </td>
  </tr>
<?php endif; ?>   

<?php  if(isset($examen[ID_TEST_VOCACIONAL])): ?>   
  <tr>
    <td><h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_VOCACIONAL] ?></h5>
	<div style="margin-left:15px"><?php  echo $vocaciones ?></div>
</td>
  </tr>
<?php endif; ?>  

<?php  if(isset($examen[ID_TEST_LABORAL])): ?>   
  <tr>
    <td><h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_LABORAL] ?></h5>
	<div style="margin-left:15px"><?php  echo $puntaje_laboral ?></div>
</td>
  </tr>
<?php endif; ?>  

<?php  if(isset($examen[ID_TEST_CONDUCTUAL])): ?>   
  <tr>
    <td>
	<h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_CONDUCTUAL] ?></h5>
	<div style="margin-left:15px"><?php  echo $tabla_conductual ?></div>

	<?php if(!empty($cd_diag)): ?>
	<h5><?php  echo ($cuanti - 1) ?>.1. Diagnostico: <?php echo $cd_diag ?></h5>
	<b>Sintomatologìa:</b> <?php echo $cd_sint ?>
	<?php endif; ?>
	</td>
  </tr>
<?php endif; ?>  

<?php  if(isset($examen[ID_TEST_TEPETE])): ?>   
  <tr>
    <td>
	<h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_TEPETE] ?></h5>
	<div style="margin-left:15px">
		<table  class="conductual" cellpadding="0" cellspacing="0">
		<?php  
		foreach($tepete as $tkey => $titem){
			echo "<tr><td>".$secciones[$tkey]."</td><td>".tpt_diag($tkey,$titem)."</td></tr>";
		}   ?>
		</table>
	</div>


	</td>
  </tr>
<?php endif; ?> 

<?php  if(isset($examen[ID_TEST_EYNSECK])): ?>  
  <tr>
    <td>
		<h5><?php  echo $cuanti++ ?>. <?php  echo $testname[ID_TEST_EYNSECK] ?></h5>
		 <div style="margin-left:15px"><span style="font-size:9px">(<?php  echo $eynseck_total ?>)</span></p>
		</div>
	</td>
  </tr>
<?php endif; ?> 

<!-- 
<  if($recomendaciones): ?>  
  <tr>
    <td><h5>< o $cuanti++ ?>. Conclusiones y Recomendaciones</h5>
    <div style="margin-left:15px">< $recomendaciones ?></div>

	</td>
  </tr>
< endif; ?>
-->

  <tr>
    <td align="right"><b>Ps. Manuel Perales Quiroz</b> </td>
  </tr>
</table>
</div>


