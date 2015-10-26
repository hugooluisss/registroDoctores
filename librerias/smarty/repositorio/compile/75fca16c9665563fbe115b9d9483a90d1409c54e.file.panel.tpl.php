<?php /* Smarty version Smarty-3.1.11, created on 2015-10-22 13:26:48
         compiled from "templates/plantillas/modulos/usuarios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1359635726560849c82f4bd4-55217317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75fca16c9665563fbe115b9d9483a90d1409c54e' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panel.tpl',
      1 => 1445279367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1359635726560849c82f4bd4-55217317',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_560849c8367b70_58444007',
  'variables' => 
  array (
    'tipos' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560849c8367b70_58444007')) {function content_560849c8367b70_58444007($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de usuarios</h1>
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
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipo" name="selTipo">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<label for="txtNombre" class="col-lg-2">Nombre completo</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtNombre" name="txtNombre">
							<span class="help-block">Nombre(s)</span>
						</div>
						<div class="col-lg-3">
							<input class="form-control" id="txtApp" name="txtApp">
							<span class="help-block">Apellido paterno</span>
						</div>
						<div class="col-lg-3">
							<input class="form-control" id="txtApm" name="txtApm">
							<span class="help-block">Apellido materno</span>
						</div>
					</div>
					<div class="form-group">
						<label for="txtEstado" class="col-lg-2">Estado</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEstado" name="txtEstado" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-lg-2">Correo electrónico</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-lg-2">Contraseña</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCedula" class="col-lg-2">Cédula</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtCedula" name="txtCedula" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEspecialidad" class="col-lg-2">Especialidad</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEspecialidad" name="txtEspecialidad" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="txtUniversidad" class="col-lg-2">Universidad</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtUniversidad" name="txtUniversidad" type="text">
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