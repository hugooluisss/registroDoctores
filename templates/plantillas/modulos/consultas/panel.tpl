<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Registro de consultas</h1>
	</div>
</div>
<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-8">
				<div class="form-group">
					<label for="txtConsultorio" class="col-xs-3">Consultorio</label>
					<div class="col-xs-8">
						<input type="text" id="txtConsultorio" name="txtConsultorio" class="form-control" disabled="true"/>
					</div>
					<div class="col-xs-1">
						<a href="#" class="btn btn-success" data-toggle="modal" data-target="#winConsultorios">Buscar</a>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
					<input type="text" id="txtFecha" name="txtFecha" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="{$smarty.now|date_format:"Y-m-d"}"/>
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
						{foreach from=$consultorios item=row}
						<tr consultorio='{$row.json}'>
							<td>{$row.idConsultorio}</td>
							<td>{$row.clave}</td>
							<td>{$row.nombre}</td>
						</tr>
						{/foreach}
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
