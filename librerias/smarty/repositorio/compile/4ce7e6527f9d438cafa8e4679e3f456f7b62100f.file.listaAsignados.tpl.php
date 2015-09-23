<?php /* Smarty version Smarty-3.1.11, created on 2015-09-18 21:52:17
         compiled from "templates/plantillas/modulos/usuarios/listaAsignados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178040228955fb02b809bb27-89644951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ce7e6527f9d438cafa8e4679e3f456f7b62100f' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/listaAsignados.tpl',
      1 => 1442631129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178040228955fb02b809bb27-89644951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55fb02b80ff0f4_09162261',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55fb02b80ff0f4_09162261')) {function content_55fb02b80ff0f4_09162261($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblUsuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Ap. Paterno</th>
					<th>Ap. Materno</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['app'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['apm'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>