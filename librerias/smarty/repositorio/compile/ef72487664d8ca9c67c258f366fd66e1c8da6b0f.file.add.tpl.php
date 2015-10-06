<?php /* Smarty version Smarty-3.1.11, created on 2015-10-05 22:36:37
         compiled from "templates/plantillas/modulos/consultas/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:719665452560e0d442e4462-93836419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef72487664d8ca9c67c258f366fd66e1c8da6b0f' => 
    array (
      0 => 'templates/plantillas/modulos/consultas/add.tpl',
      1 => 1444101392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '719665452560e0d442e4462-93836419',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_560e0d4435ddf8_78709952',
  'variables' => 
  array (
    'turnos' => 0,
    'row' => 0,
    'servicio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e0d4435ddf8_78709952')) {function content_560e0d4435ddf8_78709952($_smarty_tpl) {?><ul id="panelTabs" class="nav nav-tabs">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['turnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<li><a data-toggle="tab" href="#turno_<?php echo $_smarty_tpl->tpl_vars['row']->value['idTurno'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</a></li>
	<?php } ?>
</ul>

<div class="tab-content">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['turnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div id="turno_<?php echo $_smarty_tpl->tpl_vars['row']->value['idTurno'];?>
" class="tab-pane fade in active">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de servicios</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="tblServicios table table-bordered table-hover">
						<thead>
							<tr>
								<th>Servicio</th>
								<th>Tipo</th>
								<th style="width: 20%">Cantidad</th>
							</tr>
						</thead>
						<tbody>
					<?php  $_smarty_tpl->tpl_vars["servicio"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["servicio"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['servicios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["servicio"]->key => $_smarty_tpl->tpl_vars["servicio"]->value){
$_smarty_tpl->tpl_vars["servicio"]->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['nombre'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['servicio']->value['descripcion'];?>
</td>
								<td><input class="form-control cantidades" servicio="<?php echo $_smarty_tpl->tpl_vars['servicio']->value['idServicio'];?>
" turno="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTurno'];?>
" type="text" placeholder="cantidad" value="<?php echo $_smarty_tpl->tpl_vars['servicio']->value['cantidad'];?>
"></td>
							</tr>
					<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>
</div><?php }} ?>