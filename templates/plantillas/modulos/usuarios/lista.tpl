<div class="box">
	<div class="box-header">
		<h3 class="box-title">Lista de trabajadores</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
		<table id="tblUsuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Ap. Paterno</th>
					<th>Ap. Materno</th>
					<th>Tipo</th>
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
						<td>{$row.tipo}</td>
						<td style="text-align: right">
							{if $row.idTipo eq 2}
							<button type="button" class="btn btn-info btn-circle" action="encargados" title="Doctores encargados" usuario="{$row.idUsuario}"><i class="fa fa-user"></i></button>
							{/if}
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" usuario="{$row.idUsuario}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>