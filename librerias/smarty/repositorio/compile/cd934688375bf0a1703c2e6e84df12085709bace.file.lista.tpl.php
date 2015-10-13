<?php /* Smarty version Smarty-3.1.11, created on 2015-10-13 09:09:11
         compiled from "templates/plantillas/modulos/consultorios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93432564956084a9d6ec766-25348369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd934688375bf0a1703c2e6e84df12085709bace' => 
    array (
      0 => 'templates/plantillas/modulos/consultorios/lista.tpl',
      1 => 1443467379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93432564956084a9d6ec766-25348369',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56084a9d831354_46229704',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56084a9d831354_46229704')) {function content_56084a9d831354_46229704($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblConsultorios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Clave</th>
					<th>Nombre</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idConsultorio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success" action="turnos" title="Turnos" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idConsultorio'];?>
" turnos='<?php echo $_smarty_tpl->tpl_vars['row']->value['turnos'];?>
'><i class="fa fa-clock-o"></i></button>
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idConsultorio'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>