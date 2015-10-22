<?php /* Smarty version Smarty-3.1.11, created on 2015-10-22 13:40:01
         compiled from "templates/plantillas/modulos/reporte/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20973258145615ecbd1737b3-71010471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8499e61e69e8fbc19a08a69e4490593b3f53fd2f' => 
    array (
      0 => 'templates/plantillas/modulos/reporte/lista.tpl',
      1 => 1445539187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20973258145615ecbd1737b3-71010471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5615ecbd1e78e4_89339153',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5615ecbd1e78e4_89339153')) {function content_5615ecbd1e78e4_89339153($_smarty_tpl) {?><div class="box hidden-xs">
	<div class="box-body">
		<table id="tblReportes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Consultorio</th>
					<th>Turno</th>
					<th>Cubículo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['consultorio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['turno'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cubiculo'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn" action="excel" title="Generar reporte en Excel" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-excel-o"></i></button>
							<button type="button" class="btn" action="email" title="Enviar por email" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-paper-plane-o"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="box visible-xs">
	<div class="box-body">
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['row']->value['consultorio'];?>
</h3>
				</div>
				<div class="panel-body">
					<b>Turno: </b><?php echo $_smarty_tpl->tpl_vars['row']->value['turno'];?>
<br />
					<b>Cubículo: </b><?php echo $_smarty_tpl->tpl_vars['row']->value['cubiculo'];?>
<br />
				</div>
				<div class="panel-footer">
					<button type="button" class="btn" action="excel" title="Generar reporte en Excel" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-excel-o"></i></button>
					<button type="button" class="btn" action="email" title="Enviar por email" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-paper-plane-o"></i></button>
				</div>
			</div>
		<?php } ?>
	</div>
</div><?php }} ?>