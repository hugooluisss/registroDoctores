<?php /* Smarty version Smarty-3.1.11, created on 2015-10-05 13:07:42
         compiled from "templates/plantillas/modulos/consultas/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:719665452560e0d442e4462-93836419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef72487664d8ca9c67c258f366fd66e1c8da6b0f' => 
    array (
      0 => 'templates/plantillas/modulos/consultas/add.tpl',
      1 => 1444068453,
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
    'key' => 0,
    'item' => 0,
    'servicios' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e0d4435ddf8_78709952')) {function content_560e0d4435ddf8_78709952($_smarty_tpl) {?><form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">			
			<div class="form-group">
				<label for="selTurno" class="col-lg-2">Turno</label>
				<div class="col-lg-4">
					<select class="form-control" id="selTurno" name="selTurno">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['turnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>

						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selServicio" class="col-lg-2">Servicio</label>
				<div class="col-lg-8">
					<select class="form-control" id="selServicio" name="selServicio">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><b><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</b> (<?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
)
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selCantidad" class="col-lg-2">Cantidad</label>
				<div class="col-lg-1">
					<select class="form-control" id="selCantidad" name="selCantidad">
						<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

						<?php }} ?>
					</select>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form><?php }} ?>