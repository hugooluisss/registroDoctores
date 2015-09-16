$(document).ready(function(){
	getLista();
		
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			selTurno: "required",
			selEncargado: "required",
			txtClave: "required",
			txtNombre: "required",
			txtEstado: "required",
			txtCiudad: "required",
			selCubiculos: "required",
		},
		wrapper: 'span', 
		messages: {
			selTurno: "Este campos es necesario",
			selEncargado: "Este campos es necesario",
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
				$("#selEncargado").val(), 
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
				$("#selTurno").val(el.idTurno);
				$("#selEncargado").val(el.idEncargado);
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
		});
	}
});