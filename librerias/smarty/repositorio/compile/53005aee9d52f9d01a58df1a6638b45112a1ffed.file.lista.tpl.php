<?php /* Smarty version Smarty-3.1.11, created on 2015-09-16 11:32:48
         compiled from "templates/plantillas/modulos/servicios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93941300455f99988eaea80-00202854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53005aee9d52f9d01a58df1a6638b45112a1ffed' => 
    array (
      0 => 'templates/plantillas/modulos/servicios/lista.tpl',
      1 => 1442421153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93941300455f99988eaea80-00202854',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55f99989050fe8_24418825',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f99989050fe8_24418825')) {function content_55f99989050fe8_24418825($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3 class="box-title">Lista de servicios</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
		<table id="btlServicios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Tipo</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idServicio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idServicio'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>