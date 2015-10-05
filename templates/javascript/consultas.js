$(document).ready(function(){
	$("[data-mask]").inputmask();
	
	$("#tblConsultorios").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": true,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	
	$("#tblConsultorios tr[consultorio]").click(function(){
		var el = jQuery.parseJSON($(this).attr("consultorio"));
		
		$('#winConsultorios').modal('hide');
		
		$("#txtConsultorio").val(el.nombre);
		$("#txtConsultorio").attr("idConsultorio", el.idConsultorio);
		
		var obj = new TConsulta;
		obj.getPanelAdd(el.idConsultorio, "add", {
			after: function(){
				$("#frmAdd").validate({
					debug: true,
					rules: {
						selTurno: "required",
						selServicio: "required"
					},
					wrapper: 'span', 
					messages: {
						selTurno: "Este campos es necesario",
						selServicio: "Este campos es necesario"
					},
					submitHandler: function(form){
						var obj = new TConsulta;
						obj.add($("#txtConsultorio").attr("idConsultorio"), $("#selTurno").val(), $("#txtFecha").val(), $("#selCantidad").val(), $("#selServicio").val(), {
							after: function(datos){
								if (datos.band){
									getLista();
									$("#frmAdd").get(0).reset();
									$('#panelTabs a[href="#listas"]').tab('show');
								}else{
									alert("Upps... " + datos.mensaje);
								}
							}
						});
					}
				});
			}
		});
	});
});