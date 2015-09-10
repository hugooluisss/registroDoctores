<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de reactivos</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Reactivos agregados</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
  <li><a data-toggle="tab" href="#multimedia">Multimedia</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtInstrucciones" class="col-lg-2">Instrucciones</label>
						<div class="col-lg-10">
							<textarea id="txtInstrucciones" name="txtInstrucciones" class="form-control" rows="15" cols=""></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="selValor" class="col-lg-2">Valor (puntos)</label>
						<div class="col-lg-1">
							<select id="selValor" name="selValor" class="form-control">
								{section loop=11 start= 1 name=cont}
									<option value={$smarty.section.cont.index}>{$smarty.section.cont.index}
								{/section}
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
	</div>
	
	<div id="multimedia" class="tab-pane fade">
		<div class="box">
			<div class="box-body">
				<p>
					<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Seleccionar archivos...</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="fileupload" type="file" name="files[]" multiple>
					</span>
				</p>
				<div id="progress" class="progress">
					<div class="progress-bar progress-bar-success"></div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-body" id="dvListaMedios">
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="examen" value="{$examen}"/>