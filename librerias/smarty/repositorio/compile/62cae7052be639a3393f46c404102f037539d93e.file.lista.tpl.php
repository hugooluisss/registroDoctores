<?php /* Smarty version Smarty-3.1.11, created on 2015-10-01 21:35:05
         compiled from "templates/plantillas/modulos/tipoServicios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:731385689560ded590739a1-99069402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62cae7052be639a3393f46c404102f037539d93e' => 
    array (
      0 => 'templates/plantillas/modulos/tipoServicios/lista.tpl',
      1 => 1442285780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '731385689560ded590739a1-99069402',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_560ded59151a89_80008985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560ded59151a89_80008985')) {function content_560ded59151a89_80008985($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblTipos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Descripcion</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idTipo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" idTipo="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTipo'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>