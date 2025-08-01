<div class="vocaciones cakeform">
<?php echo $this->Form->create('Vocacion');?>
	<fieldset>
		<legend><?php __('Add Vocacion'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link('Listado Vocaciones', array('action' => 'index'));?></li>
	</ul>
</div>
