<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de exámenes</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Agregar / Modificar</h3>
		</div>
		<div class="box-body">			
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre</label>
				<div class="col-lg-10">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false">
				</div>
			</div>
			<div class="form-group">
				<label for="txtPeriodo" class="col-lg-2">Periodo</label>
				<div class="col-lg-3">
					<input type="text" id="txtPeriodo" name="txtPeriodo" class="form-control" autocomplete="false">
				</div>
			</div>
			<div class="form-group">
				<label for="txtHoras" class="col-lg-2">Tiempo (HH:MM)</label>
				<div class="col-lg-1">
					<select id="selHoras" name="selHoras" class="form-control">
						{section loop=24 name=cont}
							<option value={$smarty.section.cont.index}>{$smarty.section.cont.index|string_format: "%02d"}
						{/section}
					</select>
				</div>
				<div class="col-lg-1">
					<select id="selMinutos" name="selMinutos" class="form-control">
						{section loop=60 name=cont}
							<option value={$smarty.section.cont.index}>{$smarty.section.cont.index|string_format: "%02d"}
						{/section}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-lg-2">Descripción</label>
				<div class="col-lg-8">
					<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>

<div id="dvLista">
</div>