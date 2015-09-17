<div class="box">
	<div class="box-body">
		<table id="tblUsuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Ap. Paterno</th>
					<th>Ap. Materno</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idUsuario}</td>
						<td>{$row.nombre}</td>
						<td>{$row.app}</td>
						<td>{$row.apm}</td>
						<td style="text-align: right">
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>