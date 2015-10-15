<?php /* Smarty version Smarty-3.1.11, created on 2015-10-14 23:03:17
         compiled from "templates/plantillas/modulos/reportes/listaCiudad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2096058229561e87c55a5591-88520720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '768a08d14d76a4088c4edc9ea3b4ceea582d3768' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaCiudad.tpl',
      1 => 1444881521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2096058229561e87c55a5591-88520720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_561e87c568b971_95020126',
  'variables' => 
  array (
    'consultas' => 0,
    'row' => 0,
    'clasificacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561e87c568b971_95020126')) {function content_561e87c568b971_95020126($_smarty_tpl) {?><table id="tblRCiudad" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Ciudad</th>
			<th>Servicio</th>
			<th>Tipo</th>
			<th>Cantidad</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['consultas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['ciudad'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['servicio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['tipoServicio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clasificacion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td><b>Total de <?php echo $_smarty_tpl->tpl_vars['row']->value['clasificacion'];?>
</b></td>
			<td><b><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</b></td>
		</tr>
		<?php } ?>
	</tfoot>
</table><?php }} ?>