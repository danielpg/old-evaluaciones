<?php ?><div class="vocaciones cakeform view">

<h2><?php __('Editar Vocacion'); ?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>

<?php echo $this->Form->create('Vocacion');?>
	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	
<?php echo $this->Form->end('Enviar');?>
</div>

