<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
	<li><a data-toggle="tab" href="#ciudad">Por ciudad</a></li>
</ul>


<div class="tab-content">
	<div id="ciudad" class="tab-pane fade in active">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selMes" class="col-xs-2">Mes</label>
							<div class="col-xs-8">
								<select id="selMes" name="selMes">
									{foreach from=$meses item="row" key="id"}
										<option value="{$id}" {if $mes eq $id}selected{/if}>{$row}
									{/foreach}
								</select>
								<select id="selAnio" name="selAnio">
									{for $var=$anio-5 to $anio}
									<option value="{$var}" {if $var eq date("Y")}selected{/if}>{$var}
									{/for}
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selCiudad" class="col-xs-2">Ciudad</label>
							<div class="col-xs-8">
								<select id="selCiudad" name="selCiudad">
									{foreach from=$estados item="row" key="id"}
									<option value="{$row.estado}-{$row.ciudad}">{$row.estado} - {$row.ciudad}
									{/foreach}
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<a href="#" class="btn btn-success" id="btnBuscar">Buscar</a>
					</div>
				</div>

				<div id="dvLista">
				</div>
			</div>
		</div>
	</div>
</div>