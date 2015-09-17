<?php /* Smarty version Smarty-3.1.11, created on 2015-09-16 22:46:33
         compiled from "templates/plantillas/modulos/consultorios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121679590155f99d6e72b240-14258796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd89e10efac647d230be770061b89b417a74aaf3b' => 
    array (
      0 => 'templates/plantillas/modulos/consultorios/panel.tpl',
      1 => 1442461591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121679590155f99d6e72b240-14258796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55f99d6e790e15_45738830',
  'variables' => 
  array (
    'turnos' => 0,
    'key' => 0,
    'item' => 0,
    'encargados' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f99d6e790e15_45738830')) {function content_55f99d6e790e15_45738830($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Consultorios</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="selTurno" class="col-lg-2">Turno</label>
						<div class="col-lg-2">
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
						<label for="selEncargado" class="col-lg-2">Encargado</label>
						<div class="col-lg-6">
							<select class="form-control" id="selEncargado" name="selEncargado">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['encargados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<label for="txtClave" class="col-lg-2">Clave</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtClave" name="txtClave">
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEstado" class="col-lg-2">Estado</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEstado" name="txtEstado">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCiudad" class="col-lg-2">Ciudad</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtCiudad" name="txtCiudad">
						</div>
					</div>
					<div class="form-group">
						<label for="selCubiculos" class="col-lg-2">Cubículos</label>
						<div class="col-lg-1">
							<select class="form-control" id="selCubiculos" name="selCubiculos">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
									<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>

								<?php endfor; endif; ?>
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
		</form>
	</div>
</div><?php }} ?>