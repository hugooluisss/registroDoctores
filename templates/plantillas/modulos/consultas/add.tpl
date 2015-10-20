<ul id="panelTabs" class="nav nav-tabs">
	{foreach from=$turnos item="row"}
		<li><a data-toggle="tab" href="#turno_{$row.idTurno}">{$row.nombre}</a></li>
	{/foreach}
		<li><a data-toggle="tab" href="#totales">Totales</a></li>
</ul>

<div class="tab-content">
	{foreach from=$turnos item="row"}
		<div id="turno_{$row.idTurno}" class="tab-pane fade in active">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de servicios</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<label for="selCubiculo" class="col-xs-3">Cubículo</label>
						<div class="col-xs-9">
							<select id="selCubiculo" class="selCubiculo" turno="{$row.idTurno}">
								{section name=cubiculos start=0 loop=$cubiculos step=1}
								<option value="{$smarty.section.cubiculos.index+1}">{$smarty.section.cubiculos.index+1}
								{/section}
							</select>
						</div>
					</div>
					<table class="tblServicios table table-bordered table-hover" turno="{$row.idTurno}">
						<thead>
							<tr>
								<th class="hidden-xs">#</th>
								<th class="hidden-xs">Tipo</th>
								<th>Servicio</th>
								{section name=cubiculos start=0 loop=$cubiculos step=1}
									<th cubiculo="{$smarty.section.cubiculos.index+1}">Cub {$smarty.section.cubiculos.index+1}</th>
								{/section}
							</tr>
						</thead>
						<tbody>
					{assign var="cont" value=0}
					
					{foreach from=$row.servicios item="servicio"}
						{assign var="cont" value=$cont+1}
							<tr>
								<td class="hidden-xs">{$cont}</td>
								<td class="hidden-xs" style="text-align: left">{$servicio.descripcion}</td>
								<td style="text-align: left">{$servicio.nombre}</td>
								{section name=cubiculos start=0 loop=$cubiculos step=1}
									<td style="text-align: right"><input class="form-control cantidades" style="width: 50px" servicio="{$servicio.idServicio}" clasificacion="{$servicio.idClasificacion}" turno="{$row.idTurno}" type="text" value="{$servicio.cantidad[$smarty.section.cubiculos.index+1]}" cubiculo="{$smarty.section.cubiculos.index+1}" data-mask></td>
								{/section}
							</tr>
					{/foreach}
						</tbody>
						<tfoot>
							<tr turno="{$row.idTurno}">
								<th class="hidden-xs" colspan="2">
								<th style="text-align: right">Total</td>
								{section name=cubiculos start=0 loop=$cubiculos step=1}
								<th class="total" cubiculo="{$smarty.section.cubiculos.index+1}"></th>
								{/section}
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	{/foreach}
	<div id="totales" class="tab-pane fade">
		<div class="box">
			<div class="box-body">
				{foreach from=$clasificacionServicios item="row"}
				<div class="row">
					<div class="col-xs-6 col-md-3">{$row.clasificacion}</div>
					<div class="col-xs-6 col-md-3" clasificacion="{$row.idClasificacion}"></div>
				</div>
				{/foreach}
			</div>
		</div>
	</div>
</div>