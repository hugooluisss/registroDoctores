<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportar consultas</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-8">
				<div class="form-group">
					<label for="selMes" class="col-xs-1">Mes</label>
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
					<div class="col-xs-1">
						<a href="#" class="btn btn-success" id="btnBuscar">Buscar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="dvLista">
</div>