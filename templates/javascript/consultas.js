$(document).ready(function(){
	$("[data-mask]").inputmask();
	
	
	$("#tblConsultorios tr[consultorio]").click(function(){
		var el = jQuery.parseJSON($(this).attr("consultorio"));
		
		$('#winConsultorios').modal('hide');
		
		$("#txtConsultorio").val(el.nombre);
		$("#txtConsultorio").attr("idConsultorio", el.idConsultorio);
		
		getServicios(el.idConsultorio);
	});
	
	$("#txtFecha").change(function(){
		if ($("#txtConsultorio").attr("idConsultorio") != '')
			getServicios($("#txtConsultorio").attr("idConsultorio"));
	});
	
	function getServicios(consultorio){
		var obj = new TConsulta;
		obj.getPanelAdd(consultorio, $("#txtFecha").val(), "panels", {before: function(){
			$("#panels").html("Actualizando...");
		},
		after: function(){
			$('#panelTabs a:first').tab('show');
			
			$(".tblServicios").each(function(){
				$(this).DataTable({
					"responsive": true,
					"language": espaniol,
					"paging": false,
					"lengthChange": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
			
			$(".cantidades").change(function(){
				var obj = new TConsulta;
				var el = $(this);
				obj.add($("#txtConsultorio").attr("idConsultorio"), el.attr("turno"), $("#txtFecha").val(), el.val(), $(this).attr("servicio"), {
					before: function(){
						el.disabled = true;
					},
					after: function(){
						el.disabled = false;
					}
				});
			});
		}});
	}

});