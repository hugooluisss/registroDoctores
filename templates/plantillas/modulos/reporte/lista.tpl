<div class="box">
	<div class="box-body">
		<table id="tblReportes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Consultorio</th>
					<th>Turno</th>
					<th>Cubículo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.fecha|date_format}</td>
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