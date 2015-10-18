<?php /* Smarty version Smarty-3.1.11, created on 2015-10-17 09:17:00
         compiled from "templates/plantillas/modulos/consultas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1073639752560df267da6e09-13367619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dec4d765d6f45c6b45965a8bde3d19ff02a6d29a' => 
    array (
      0 => 'templates/plantillas/modulos/consultas/panel.tpl',
      1 => 1445091409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1073639752560df267da6e09-13367619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_560df267dbc363_09468503',
  'variables' => 
  array (
    'consultorios' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560df267dbc363_09468503')) {function content_560df267dbc363_09468503($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/registroDoctores/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Registro de consultas</h1>
	</div>
</div>
<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="form-group">
				<label for="txtConsultorio" class="col-md-3">Consultorio</label>
				<div class="col-md-4">
					<input type="text" id="txtConsultorio" name="txtConsultorio" class="form-control" disabled="true"/>
				</div>
				<div class="col-md-1">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#winConsultorios">Listar consultorios</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="txtFecha" class="col-md-3">Fecha</label>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type="text" id="txtFecha" name="txtFecha" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" id="panels"></div>


<div class="modal fade" id="winConsultorios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Consultorios</h1>
			</div>
			<div class="modal-body">
				<table id="tblConsultorios" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Clave</th>
							<th>Nombre</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['consultorios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<tr consultorio='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idConsultorio'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="consultorio" name="consultorio" value="" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<?php }} ?>