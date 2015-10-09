<?php /* Smarty version Smarty-3.1.11, created on 2015-10-09 10:45:34
         compiled from "templates/plantillas/modulos/reporte/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19314030235615e3119f1188-82540474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7fa4569d1c5dad4d9c9f93447ff6e54b31e817c' => 
    array (
      0 => 'templates/plantillas/modulos/reporte/panel.tpl',
      1 => 1444331548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19314030235615e3119f1188-82540474',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5615e311a206f9_05267995',
  'variables' => 
  array (
    'meses' => 0,
    'id' => 0,
    'mes' => 0,
    'row' => 0,
    'anio' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5615e311a206f9_05267995')) {function content_5615e311a206f9_05267995($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportar consultas</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-8">
				<div class="form-group">
					<label for="selMes" class="col-xs-3">Mes</label>
					<div class="col-xs-8">
						<select id="selMes" name="selMes">
							<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['meses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["id"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['mes']->value==$_smarty_tpl->tpl_vars['id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>

							<?php } ?>
						</select>
						<select id="selAnio" name="selAnio">
							<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int)ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['anio']->value+1 - ($_smarty_tpl->tpl_vars['anio']->value-5) : $_smarty_tpl->tpl_vars['anio']->value-5-($_smarty_tpl->tpl_vars['anio']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0){
for ($_smarty_tpl->tpl_vars['var']->value = $_smarty_tpl->tpl_vars['anio']->value-5, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++){
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value==date("Y")){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value;?>

							<?php }} ?>
						</select>
					</div>
					<div class="col-xs-1">
						<a href="#" class="btn btn-success" id="btnBuscar">Buscar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="dvLista">
</div><?php }} ?>