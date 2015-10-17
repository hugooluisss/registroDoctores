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
			
			$("#panels [data-mask]").inputmask({
				 mask: '99'
			});
			
			$(".tblServicios").each(function(){
				var tablaServicios = $(this).DataTable({
					"responsive": false,
					"language": espaniol,
					"paging": false,
					"lengthChange": false,
					"ordering": false,
					"info": true,
					"autoWidth": false
				});
				
				for(var cont = 1 ; cont <= 4 ; cont++)
					tablaServicios.column(cont + 2).visible(false);
						
				tablaServicios.column(3).visible(true);
				
				$("#selCubiculo[turno=" + $(this).attr("turno") + "]").change(function(){
					for(var cont = 1 ; cont <= 4 ; cont++)
						tablaServicios.column(cont + 2).visible(cont == $("#selCubiculo[turno=" + $(this).attr("turno") + "]").val());
					
					getTotal();
				});
			});
			
			getTotal($(this).attr("turno"));
			
			$(".cantidades").change(function(){
				var obj = new TConsulta;
				var el = $(this);
				obj.add($("#txtConsultorio").attr("idConsultorio"), el.attr("turno"), $("#txtFecha").val(), el.val(), $(this).attr("servicio"), $(this).attr("cubiculo"), {
					before: function(){
						el.disabled = true;
					},
					after: function(data){
						el.disabled = false;
						if (data.band == false){
							alert("Ocurrió un error al actualizar el campo");
							el.val("");
							el.select();
						}else
							getTotal();
					}
				});
			});
		}});
	}
	
	function getTotal(){
		$("#selCubiculo[turno]").each(function(){
			var selCubiculo = $(this);
			var total = 0;
			$(".cantidades[cubiculo=" + selCubiculo.val() + "]").each(function(){
				if ($(this).val() != '' && $(this).attr("turno") == selCubiculo.attr("turno"))
					total += parseInt($(this).val());
			});
			
			$("tr[turno="+ selCubiculo.attr("turno") +"] .total[cubiculo=" + selCubiculo.val() + "]").html(total);
		});
		
		$("#totales div[clasificacion]").each(function(){
			var clasificacion = $(this).attr("clasificacion");
			
			total = 0;
			$("input[clasificacion=" + clasificacion + "]").each(function(){
				if ($(this).val() != '')
					total += parseInt($(this).val());
			});
			
			$(this).html(total);
		});
	}
});