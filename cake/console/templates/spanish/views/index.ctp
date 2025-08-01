<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar;?> index">
	<h2><?php echo "<?php __('{$pluralHumanName}');?>";?></h2>

	<div class="actions">
		<ul>
			<li><?php echo "<?php echo \$this->Html->link('Nuevo " . $singularHumanName . "', array('action' => 'add')); ?>";?></li>
	<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link('Listado " . Inflector::humanize($details['controller']) . "', array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link('Nuevo " . Inflector::humanize(Inflector::underscore($alias)) . "', array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
	?>
		</ul>
	</div>
	<div style="clear:both"></div>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
	<?php  foreach ($fields as $field):?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
	<?php endforeach;?>
		<th class="actions"><?php echo "Acciones";?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	echo "<?php
	\$i = 0;
	foreach (\${$pluralVar} as \${$singularVar}):
		\$class = null;
		if (\$i++ % 2 == 0) {
			\$class = ' class=\"altrow\"';
		}
	?>\n";
	echo "\t<tr<?php echo \$class;?>>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<a href=\"<?php echo \$this->Html->url( array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\"><i class=\"fa fa-search\"></i> Ver </a>  \n";
		echo "\t\t\t<a href=\"<?php echo \$this->Html->url( array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\"><i class=\"fa fa-pencil\"></i> Editar </a>  \n";
		echo "\t\t\t<a href=\"<?php echo \$this->Html->url( array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\" onclick=\"return_confirm('Estas seguro de eliminar #% \${$singularVar}['{$modelClass}']['{$primaryKey}']?\"><i class=\"fa fa-trash-o\"></i> Eliminar </a>  \n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</tbody>
	</table>

	<div class="paging">
	<?php echo "\t<?php echo \$this->Paginator->prev('<< ' . 'Atras', array(), null, array('class'=>'disabled'));?>\n";?>
	  <?php echo "\t<?php echo \$this->Paginator->numbers();?>\n"?> 
	<?php echo "\t<?php echo \$this->Paginator->next('Siguiente' . ' >>', array(), null, array('class' => 'disabled'));?>\n";?>
	</div>
</div>

