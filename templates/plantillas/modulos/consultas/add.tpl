<ul id="panelTabs" class="nav nav-tabs">
	{foreach from=$turnos item="row"}
		<li><a data-toggle="tab" href="#turno_{$row.idTurno}">{$row.nombre}</a></li>
	{/foreach}
</ul>

<div class="tab-content">
	{foreach from=$turnos item="row"}
		<div id="turno_{$row.idTurno}" class="tab-pane fade in active">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de servicios</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="tblServicios table table-bordered table-hover">
						<thead>
							<tr>
								<th>Servicio</th>
								<th>Tipo</th>
								<th style="width: 20%">Cantidad</th>
							</tr>
						</thead>
						<tbody>
					{foreach from=$row.servicios item="servicio"}
							<tr>
								<td>{$servicio.nombre}</td>
								<td>{$servicio.descripcion}</td>
								<td><input class="form-control cantidades" servicio="{$servicio.idServicio}" turno="{$row.idTurno}" type="text" placeholder="cantidad" value="{$servicio.cantidad}"></td>
							</tr>
					{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	{/foreach}
</div>