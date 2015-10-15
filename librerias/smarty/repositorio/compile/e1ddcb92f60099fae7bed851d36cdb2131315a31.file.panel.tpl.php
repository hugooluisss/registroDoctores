<?php /* Smarty version Smarty-3.1.11, created on 2015-10-14 23:30:22
         compiled from "templates/plantillas/modulos/reportes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:367569085561d3c4f0f47d8-54983434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1ddcb92f60099fae7bed851d36cdb2131315a31' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/panel.tpl',
      1 => 1444882426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '367569085561d3c4f0f47d8-54983434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_561d3c4f17e8c2_96757832',
  'variables' => 
  array (
    'meses' => 0,
    'id' => 0,
    'mes' => 0,
    'row' => 0,
    'anio' => 0,
    'var' => 0,
    'estados' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561d3c4f17e8c2_96757832')) {function content_561d3c4f17e8c2_96757832($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes</h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="#">Exportar a excel</a></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selMes" class="col-xs-2">Mes</label>
							<div class="col-xs-8">
								<select id="selMesGeneral" name="selMesGeneral">
									<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['meses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["id"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['mes']->value==$_smarty_tpl->tpl_vars['id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</option>
									<?php } ?>
								</select>
								<select id="selAnioGeneral" name="selAnioGeneral">
									<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int)ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['anio']->value+1 - ($_smarty_tpl->tpl_vars['anio']->value-5) : $_smarty_tpl->tpl_vars['anio']->value-5-($_smarty_tpl->tpl_vars['anio']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0){
for ($_smarty_tpl->tpl_vars['var']->value = $_smarty_tpl->tpl_vars['anio']->value-5, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++){
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value==date("Y")){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</option>
									<?php }} ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<input type="button" class="btn btn-success" id="btnExcelGeneral" value="Generar" />
					</div>
				</div>
            </div>
            
        </div> 
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="#">Por ciudad</a></h3>
			</div>
			
			<div class="panel-body">
            	<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selMes" class="col-xs-2">Mes</label>
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
						</div>
					</div>
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selCiudad" class="col-xs-2">Ciudad</label>
							<div class="col-xs-8">
								<select id="selCiudad" name="selCiudad">
									<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["id"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['ciudad'];?>
" ciudad="<?php echo $_smarty_tpl->tpl_vars['row']->value['ciudad'];?>
" estado="<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
 - <?php echo $_smarty_tpl->tpl_vars['row']->value['ciudad'];?>

									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<input type="button" class="btn btn-success" id="btnBuscarPorCiudad" value="Buscar" />
					</div>
				</div>
				<br />
				<div class="row" id="dvListaPorCiudad"></div>
            </div>
            
        </div> 
	</div>
</div><?php }} ?>