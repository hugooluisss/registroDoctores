<div class="box hidden-xs">
	<div class="box-body">
		<table id="tblReportes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Consultorio</th>
					<th>Turno</th>
					<th>Cubículo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.consultorio}</td>
						<td>{$row.turno}</td>
						<td>{$row.cubiculo}</td>
						<td style="text-align: right">
							<button type="button" class="btn" action="excel" title="Generar reporte en Excel" datos='{$row.json}'><i class="fa fa-file-excel-o"></i></button>
							<button type="button" class="btn" action="email" title="Enviar por email" datos='{$row.json}'><i class="fa fa-paper-plane-o"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>

<div class="box visible-xs">
	<div class="box-body">
		{foreach from=$lista item="row"}
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">{$row.consultorio}</h3>
				</div>
				<div class="panel-body">
					<b>Consultorio: </b>{$row.nombreConsultorio}<br />
					<b>Estado: </b>{$row.estado} - {$row.ciudad}<br />
					<b>Turno: </b>{$row.turno}<br />
					<b>Cubículo: </b>{$row.cubiculo}<br />
				</div>
				<div class="panel-footer">
					<button type="button" class="btn" action="excel" title="Generar reporte en Excel" datos='{$row.json}'><i class="fa fa-file-excel-o"></i></button>
					<button type="button" class="btn" action="email" title="Enviar por email" datos='{$row.json}'><i class="fa fa-paper-plane-o"></i></button>
				</div>
			</div>
		{/foreach}
	</div>
</div>