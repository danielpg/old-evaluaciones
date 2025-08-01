<div class="admins cakeform view">

<h2><?php __('Editar Admin'); ?></h2>
<div class="actions">
	<ul>

		<!--li ><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $this->Form->value('Admin.id')), null, sprintf('Esta seguro de querer eliminar # %s?', $this->Form->value('Admin.id'))); ?></li-->
		<li><?php echo $this->Html->link('Ir a listado', array('action' => 'index'));?></li>
	</ul>
</div>
<div style="clear:both"></div>


<?php echo $this->Form->create('Admin');?>
	
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name' ,  ["label" => "Nombre" ]);
		echo $this->Form->input('username' ,  ["label" => "Usuario" , "readonly" => "readonly"  ] );
		echo $this->Form->input('email');
		echo $this->Form->input('password',array("type" => "text","label" => "Nueva Contraseña <b>(Dejar vacio si no piensa cambiar)</b>"));
		echo $this->Form->input('status',array("type"=>"select", "options" => array( 0 => "No habilitado" , 1 => "Habilitado")));
		echo $this->Form->input('role_id',array("type"=>"select", "options" => array( 2 => "Evaluador")));
	?>
	
<div class="submit"><input type="submit" value="Guardar"></div>
</div>

