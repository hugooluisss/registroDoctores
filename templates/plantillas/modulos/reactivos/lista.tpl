<div class="box">
	<div class="box-body">
		<table id="tblReactivos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="width: 10%">#</th>
					<th style="width: 55%">Instrucción</th>
					<th style="width: 10%">Valor</th>
					<th style="width: 10%">Posición</th>
					<th style="width: 15%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idReactivo}</td>
						<td>{$row.instrucciones|strip_tags}</td>
						<td>{$row.valor}</td>
						<td>
							<input type="text" value="{$row.posicion}" valAnterior="{$row.posicion}" objeto="{$row.idReactivo}" style="width: 100%; text-align: right" class="posicion"/>
							</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default btn-circle" action="reactivos" title="Administración de respuestas" objeto="{$row.idReactivo}"><i class="fa fa-genderless"></i></button>
							<button type="button" class="btn btn-default btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" objeto="{$row.idReactivo}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>