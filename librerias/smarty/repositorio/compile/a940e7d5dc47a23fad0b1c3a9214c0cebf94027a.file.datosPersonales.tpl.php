<?php /* Smarty version Smarty-3.1.11, created on 2015-10-17 14:22:40
         compiled from "templates/plantillas/modulos/usuarios/datosPersonales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196194458856229e922cd3b7-25438846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a940e7d5dc47a23fad0b1c3a9214c0cebf94027a' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/datosPersonales.tpl',
      1 => 1445109759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196194458856229e922cd3b7-25438846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56229e9230b118_74388952',
  'variables' => 
  array (
    'nombre' => 0,
    'app' => 0,
    'apm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56229e9230b118_74388952')) {function content_56229e9230b118_74388952($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Datos personales</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre completo</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
">
					<span class="help-block">Nombre(s)</span>
				</div>
				<div class="col-lg-3">
					<input class="form-control" id="txtApp" name="txtApp" value="<?php echo $_smarty_tpl->tpl_vars['app']->value;?>
">
					<span class="help-block">Apellido paterno</span>
				</div>
				<div class="col-lg-3">
					<input class="form-control" id="txtApm" name="txtApm" value="<?php echo $_smarty_tpl->tpl_vars['apm']->value;?>
">
					<span class="help-block">Apellido materno</span>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form><?php }} ?>