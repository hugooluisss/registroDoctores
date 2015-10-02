<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">			
			<div class="form-group">
				<label for="selTurno" class="col-lg-2">Turno</label>
				<div class="col-lg-4">
					<select class="form-control" id="selTurno" name="selTurno">
						{foreach key=key item=item from=$turnos}
							<option value="{$key}">{$item}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selServicio" class="col-lg-2">Servicio</label>
				<div class="col-lg-8">
					<select class="form-control" id="selServicio" name="selServicio">
						{foreach key=key item=item from=$servicios}
							<option value="{$key}"><b>{$item.nombre}</b> ({$item.descripcion})
						{/foreach}
					</select>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>