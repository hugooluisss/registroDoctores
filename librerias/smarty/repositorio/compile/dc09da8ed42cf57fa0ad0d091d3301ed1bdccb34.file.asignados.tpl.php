<?php /* Smarty version Smarty-3.1.11, created on 2015-09-18 22:00:35
         compiled from "templates/plantillas/modulos/usuarios/asignados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183052587955fafcd1498d38-84910791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc09da8ed42cf57fa0ad0d091d3301ed1bdccb34' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/asignados.tpl',
      1 => 1442631632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183052587955fafcd1498d38-84910791',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55fafcd149a0d0_05697841',
  'variables' => 
  array (
    'supervisor' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55fafcd149a0d0_05697841')) {function content_55fafcd149a0d0_05697841($_smarty_tpl) {?><a href="?mod=admonUsuarios" class="btn btn-danger btn-circle" title="Regresar"><i class="fa fa-chevron-left"></i> Regresar</a>		
<div class="box">
	<div class="box-head">
		<h1>Usuarios asignados al supervisor</h1>
		<b>Supervisor: </b> <?php echo $_smarty_tpl->tpl_vars['supervisor']->value->getNombreCompleto();?>

	</div class="box-body">
		<br />
		<div class="row">
			<div class="col-lg-12">
				<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label class="col-lg-1">Doctor</label>
						<div class="col-lg-6">
							<input class="form-control" autocomplete="no" id="txtNombre" name="txtNombre"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	<div>
	</div>
</div>
<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['supervisor']->value->getId();?>
"/>
<div id="dvLista">
	
</div><?php }} ?>