<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes</h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Exportar a excel</h3>
				<a class="btn btn-success btn-clickable pull-right" href="#"><i class="fa fa-chevron-down"></i></a>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
							<label for="selMes" class="col-xs-2">Mes</label>
							<div class="col-xs-8">
								<select id="selMesGeneral" name="selMesGeneral">
									{foreach from=$meses item="row" key="id"}
										<option value="{$id}" {if $mes eq $id}selected{/if}>{$row}</option>
									{/foreach}
								</select>
								<select id="selAnioGeneral" name="selAnioGeneral">
									{for $var=$anio-5 to $anio}
									<option value="{$var}" {if $var eq date("Y")}selected{/if}>{$var}</option>
									{/for}
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<input type="button" class="btn btn-success" id="btnExcel" value="Buscar" />
					</div>
				</div>
            </div>
            
        </div> 
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Reporte por ciudad</h3>
				<a class="btn btn-success btn-clickable pull-right" href="#"><i class="fa fa-chevron-down"></i></a>
			</div>
			
			<div class="panel-body">
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
									<option value="{$row.estado}-{$row.ciudad}" ciudad="{$row.ciudad}" estado="{$row.estado}">{$row.estado} - {$row.ciudad}
									{/foreach}
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<input type="button" class="btn btn-success" id="btnBuscarPorCiudad" value="Buscar" />
					</div>
				</div>
				<br />
				<div class="row" id="dvListaPorCiudad"></div>
            </div>
            
        </div> 
	</div>
</div>