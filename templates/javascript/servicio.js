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
			selTipo: "required",
			txtNombre: "required",
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Este campo es necesario",
			selTipo: "Este campo es necesario",
		},
		submitHandler: function(form){
			var obj = new TServicio;
			obj.add(
				$("#id").val(), 
				$("#selTipo").val(),
				$("#txtNombre").val(), 
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
		$.get("?mod=listaServicios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TServicio;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idTipo);
				$("#txtNombre").val(el.nombre);
				$("#selTipo").val(el.idTipo);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblServicios").DataTable({
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