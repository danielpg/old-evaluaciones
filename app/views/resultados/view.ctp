<div class="resultados view">
<h2><?php  __('Resultado');?></h2>

<div style="clear:both"></div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!--dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resultado['Resultado']['id']; ?>
			&nbsp;
		</dd-->
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nombre</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resultado['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Test</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resultado['Exam']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Fecha</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->simdate($resultado['Resultado']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Duraciòn</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php  
			if($resultado['Resultado']['duration'] > 0){
				if($resultado['Resultado']['duration'] < 61){
					echo $resultado['Resultado']['duration']." segundos.";
				} else {
					$minutes = floor($resultado['Resultado']['duration']/60);
					$secs = $resultado['Resultado']['duration'] % 60;
					echo $minutes." min. y ".$secs." segs.";
				}
			}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Clave</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
			 $tmp = json_decode($resultado['Resultado']['vars1'],true); 
			if($resultado["Resultado"]["exam_id"] == ID_TEST_CONDUCTUAL_MINI ){
				foreach($tmp as $key => $item){
				  //echo "<tr><td>".$key."</td><td></td></tr>"
					if($key == "L")$key = 6;
					echo say_conductual($key).": ".cd_mini_diag($key,$item["suma"])." / ".$item["suma"]."<br>";
				}
			}else if($resultado["Resultado"]["exam_id"] == ID_TEST_CONDUCTUAL ){
				foreach($tmp as $key => $item){
				  //echo "<tr><td>".$key."</td><td></td></tr>"
					if($key == "L")$key = 6;
					echo say_conductual($key).": ".process_scores($key,$item["suma"],1)." / ".$item["suma"]."<br>";
				}
			} else {	
				foreach($tmp as $key => $value){
					if(is_array($value)){
						echo "<b>".$key.":</b><br>";
						foreach($value as $skey => $svalue){
							//echo $skey.": ".$svalue.",";
							if($resultado['Resultado']['exam_id'] == 4){
								echo $svalue.",";
							} else {
								echo $skey.": ".$svalue.",";
							}

						}
						echo "<br>";
					} else {
						if($resultado["Resultado"]["exam_id"] == ID_TEST_TEPETE || $resultado["Resultado"]["exam_id"] == ID_TEST_TEPETE_MINI){
							echo $key.".".$secciones[$key].": ".tpt_diag($key,$value)." / ".$value."<br>";	
						} else if($resultado["Resultado"]["exam_id"] == ID_TEST_VOCACIONAL){
							echo $vocaciones[$key].": ".$value."<br>";	
						}else {
							echo $key.": ".$value."<br>";
						}


					}
				}
			}
?>
			&nbsp;
		</dd>

	</dl>
</div>

