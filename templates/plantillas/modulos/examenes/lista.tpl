<div class="box">
	<div class="box-body">
		<table id="tblExamenes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Periodo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idExamen}</td>
						<td>{$row.nombre}</td>
						<td>{$row.periodo}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default btn-circle" action="reactivos" title="Administración de reactivos" examen="{$row.idExamen}"><i class="fa fa-file-code-o"></i></button>
							<button type="button" class="btn btn-default btn-circle" action="modificar" title="Modificar" datos='{$row.json|escape:"htmlall"}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" examen="{$row.idExamen}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>