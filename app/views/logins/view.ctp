<span class="lbutton"><a href="#" onclick="javascript:history.back(1);return false;">Regresar</a></span>

<div class="dres view">
<h2>User</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

	<?php foreach($login["Login"] as $key => $value): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo $key ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $value; ?>
			&nbsp;
		</dd>

	<?php endforeach; ?>

	</dl>
</div>



