<table id="tblRCiudad" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Ciudad</th>
			<th>Servicio</th>
			<th>Tipo</th>
			<th>Cantidad</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$consultas item="row"}
			<tr>
				<td>{$row.ciudad}</td>
				<td>{$row.servicio}</td>
				<td>{$row.tipoServicio}</td>
				<td>{$row.cantidad}</td>
			</tr>
		{/foreach}
	</tbody>
	<tfoot>
		{foreach from=$clasificacion item="row"}
		<tr>
			<td colspan="2">&nbsp;</td>
			<td><b>Total de {$row.clasificacion}</b></td>
			<td><b>{$row.cantidad}</b></td>
		</tr>
		{/foreach}
	</tfoot>
</table>