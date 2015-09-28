$(document).ready(function(){
	getLista();
		
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$(".setHorario").click(function(){
		var obj = new TConsultorio();
		
		if ($(this)[0].checked)
			obj.addTurno($("#consultorio").val(), $(this).val(), {
				after: function(result){
					if (!result.band)
						alert("Ocurrió un error al agregar el turno");
					else
						getLista();
				}
			});
		else
			obj.delTurno($("#consultorio").val(), $(this).val(), {
				after: function(result){
					if (!result.band)
						alert("Ocurrió un error al eliminar el turno");
					else
						getLista();
				}
			});
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			selTurno: "required",
			selSupervisor: "required",
			selResponsable: "required",
			txtClave: "required",
			txtNombre: "required",
			txtEstado: "required",
			txtCiudad: "required",
			selCubiculos: "required",
		},
		wrapper: 'span', 
		messages: {
			selTurno: "Este campos es necesario",
			selSupervisor: "Este campos es necesario",
			selResponsable: "Este campos es necesario",
			txtClave: "Este campos es necesario",
			txtNombre: "Este campos es necesario",
			txtEstado: "Este campos es necesario",
			txtCiudad: "Este campos es necesario",
			selCubiculos: "Este campos es necesario"
		},
		submitHandler: function(form){
			var obj = new TConsultorio;
			obj.add(
				$("#id").val(), 
				$("#selTurno").val(),
				$("#selSupervisor").val(), 
				$("#selResponsable").val(), 
				$("#txtClave").val(), 
				$("#txtNombre").val(), 
				$("#txtEstado").val(), 
				$("#txtCiudad").val(), 
				$("#selCubiculos").val(), 
				{
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("?mod=listaConsultorios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TConsultorio;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#id").val(el.idConsultorio);
				$("#selSupervisor").val(el.idSupervisor);
				$("#selResponsable").val(el.idResponsable);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#txtEstado").val(el.estado); 
				$("#txtCiudad").val(el.ciudad); 
				$("#selCubiculos").val(el.cubiculos);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblConsultorios").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			
			$("[action=turnos]").click(function(){
				$('#winTurnos').modal();
				
				$('#winTurnos [type="checkbox"]').each(function(index){
					$(this)[0].checked = false;
				});
				
				$("#consultorio").val($(this).attr("identificador"));
				
				$.each(jQuery.parseJSON($(this).attr("turnos")), function(i, turno){
					$('#winTurnos [type="checkbox"][value="' + turno.idTurno + '"]')[0].checked = true;
				});
			});
		});
	}
});