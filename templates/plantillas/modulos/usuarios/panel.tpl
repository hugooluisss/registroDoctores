<div class="row">
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
								{foreach key=key item=item from=$tipos}
									<option value="{$key}">{$item}
								{/foreach}
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
</div>