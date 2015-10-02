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
		obj.getPanelAdd(el.idConsultorio, "add");
	});
});