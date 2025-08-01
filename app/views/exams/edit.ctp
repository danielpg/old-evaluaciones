<div class="exams cakeform view">

<h2><?php __('Editar Examen'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('Exam.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('Exam.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Exam');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array("label"=>"Nombre"));
		echo $this->Form->input('display',array("options" => array("0" => "Oculto" , "1" => "Habilitado" ) , "label" => "Estado" ));
		//echo $this->Form->select('display', array("0" => "Oculto" , "1" => "Habilitado" ));
	?>
	
<div class="submit"><input type="submit" value="Enviar"></div>
</div>
<style>

</style>
