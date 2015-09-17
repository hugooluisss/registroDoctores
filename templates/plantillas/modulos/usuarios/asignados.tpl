<div class="box">
	<div class="box-head">			
		<h1>Usuarios asignados al supervisor</h1>
		<b>Supervisor: </b> {$supervisor->getNombreCompleto()}
	</div class="box-body">
		<br />
		<div class="row">
			<div class="col-lg-12">
				<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label class="col-lg-1">Doctor</label>
						<div class="col-lg-6">
							<input class="form-control" autocomplete="no" id="txtNombre" name="txtNombre"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	<div>
	</div>
</div>

<div id="dvLista">
	
</div>