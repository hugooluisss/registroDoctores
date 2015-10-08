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
								<th>#</th>
								<th>Tipo</th>
								<th>Servicio</th>
								{section name=cubiculos start=0 loop=$cubiculos step=1}
									<th>Cub {$smarty.section.cubiculos.index+1}</th>
								{/section}
							</tr>
						</thead>
						<tbody>
					{assign var="cont" value=0}
					
					{foreach from=$row.servicios item="servicio"}
						{assign var="cont" value=$cont+1}
							<tr>
								<td>{$cont}</td>
								<td>{$servicio.descripcion}</td>
								<td>{$servicio.nombre}</td>
								{section name=cubiculos start=0 loop=$cubiculos step=1}
									<td><input class="form-control cantidades" servicio="{$servicio.idServicio}" turno="{$row.idTurno}" type="text" placeholder="cantidad" value="{$servicio.cantidad[$smarty.section.cubiculos.index+1]}" cubiculo="{$smarty.section.cubiculos.index+1}"></td>
								{/section}
							</tr>
					{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	{/foreach}
</div>