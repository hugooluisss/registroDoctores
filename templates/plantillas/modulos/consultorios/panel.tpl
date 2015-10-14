<div class="row">
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
	
	<div id="add" class="tab-panel fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
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
						<label for="selEncargado" class="col-lg-2">Supervisor asignado</label>
						<div class="col-lg-6">
							<select class="form-control" id="selSupervisor" name="selSupervisor">
								{foreach key=key item=item from=$supervisor}
									<option value="{$key}">{$item}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selEncargado" class="col-lg-2">Responsable sanitario</label>
						<div class="col-lg-6">
							<select class="form-control" id="selResponsable" name="selResponsable">
								{foreach key=key item=item from=$responsable}
									<option value="{$key}">{$item}
								{/foreach}
							</select>
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
								{section name=foo start=1 loop=5 step=1}
									<option value="{$smarty.section.foo.index}">{$smarty.section.foo.index}
								{/section}
							</select>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id" name="id" value=""/>
				</div>
			</div>
		</form>
	</div>
</div>


<div class="modal fade" id="winTurnos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Turnos</h4>
			</div>
			<div class="modal-body">
				{foreach from=$turnos item=it}
					<div class="row">
						<div class="col-lg-12"><label class="checkbox-inline"><input type="checkbox" value="{$it.idTurno}" class="setHorario">{$it.nombre}</label></div>
					</div>
				{/foreach}
			</div>
			<div class="modal-footer">
				<input type="hidden" id="consultorio" name="consultorio" value="" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>