<?php /* Smarty version Smarty-3.1.11, created on 2015-09-04 10:25:58
         compiled from "templates/plantillas/modulos/examenes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67765289855e870f4cf03f6-08665576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c762b879d2f62900a62c14f087f3f2c16ac6e34' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/lista.tpl',
      1 => 1441380351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67765289855e870f4cf03f6-08665576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55e870f4d33c53_72285209',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e870f4d33c53_72285209')) {function content_55e870f4d33c53_72285209($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblExamenes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Periodo</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['periodo'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default btn-circle" action="reactivos" title="Administración de reactivos" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-file-code-o"></i></button>
							<button type="button" class="btn btn-default btn-circle" action="modificar" title="Modificar" datos='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['json'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>