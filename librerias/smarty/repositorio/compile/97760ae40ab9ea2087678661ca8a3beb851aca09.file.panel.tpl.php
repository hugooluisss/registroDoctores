<?php /* Smarty version Smarty-3.1.11, created on 2015-09-04 09:28:39
         compiled from "templates/plantillas/modulos/examenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98020596955e8647cc277a2-50622467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97760ae40ab9ea2087678661ca8a3beb851aca09' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/panel.tpl',
      1 => 1441376917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98020596955e8647cc277a2-50622467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55e8647cc44316_54729413',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e8647cc44316_54729413')) {function content_55e8647cc44316_54729413($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de exámenes</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Agregar / Modificar</h3>
		</div>
		<div class="box-body">			
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre</label>
				<div class="col-lg-10">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false">
				</div>
			</div>
			<div class="form-group">
				<label for="txtPeriodo" class="col-lg-2">Periodo</label>
				<div class="col-lg-3">
					<input type="text" id="txtPeriodo" name="txtPeriodo" class="form-control" autocomplete="false">
				</div>
			</div>
			<div class="form-group">
				<label for="txtHoras" class="col-lg-2">Tiempo (HH:MM)</label>
				<div class="col-lg-1">
					<select id="selHoras" name="selHoras" class="form-control">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cont'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['name'] = 'cont';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total']);
?>
							<option value=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cont']['index'];?>
><?php echo sprintf("%02d",$_smarty_tpl->getVariable('smarty')->value['section']['cont']['index']);?>

						<?php endfor; endif; ?>
					</select>
				</div>
				<div class="col-lg-1">
					<select id="selMinutos" name="selMinutos" class="form-control">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cont'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['name'] = 'cont';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cont']['total']);
?>
							<option value=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cont']['index'];?>
><?php echo sprintf("%02d",$_smarty_tpl->getVariable('smarty')->value['section']['cont']['index']);?>

						<?php endfor; endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-lg-2">Descripción</label>
				<div class="col-lg-8">
					<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>

<div id="dvLista">
</div><?php }} ?>