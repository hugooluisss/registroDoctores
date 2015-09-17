$(document).ready(function(){
	getLista();
	$("#selTipo").change(function(){changeTipo()});
	changeTipo();
	
	function changeTipo(){
		if ($("#selTipo").val() == 3)
			jQuery.each([$("#txtUniversidad"), $("#txtEspecialidad"), $("#txtCedula")], function(index, el){
				el.prop('disabled', false);
			});
		else
			jQuery.each([$("#txtUniversidad"), $("#txtEspecialidad"), $("#txtCedula")], function(index, el){
				el.prop('disabled', true);
			});
			
	}
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		changeTipo();
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		changeTipo();
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtEmail: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		messages: {
			txtEmail: "Este campo es necesario",
			txtPass: "Este campo es necesario"
		},
		submitHandler: function(form){
			if ($("#selTipo").val() == 3 && $("#txtCedula").val() == ''){ // hay que validar que tenga minimamente el numero de cedula
				alert("indica el número de cédula del doctor");
			}else{
				var obj = new TUsuario;
				obj.add(
					$("#id").val(), 
					$("#txtNombre").val(), 
					$("#txtApp").val(),
					$("#txtApm").val(),
					$("#txtEmail").val(),
					$("#txtPass").val(),
					$("#txtCedula").val(),
					$("#txtUniversidad").val(),
					$("#txtEspecialidad").val(),
					$("#selTipo").val(),
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
        }

    });
		
	function getLista(){
		$.get("?mod=listaUsuarios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUsuario;
					obj.del($(this).attr("usuario"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idUsuario);
				$("#txtNombre").val(el.nombre);
				$("#txtApp").val(el.app);
				$("#txtApm").val(el.apm);
				$("#txtEmail").val(el.email);
				$("#txtPass").val(el.pass);
				$("#txtCedula").val(el.cedula);
				$("#txtUniversidad").val(el.universidad);
				$("#txtEspecialidad").val(el.especialidad);
				$("#selTipo").val(el.idTipo);
				changeTipo();
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=encargados]").click(function(){
				location.href = "?mod=doctoresAsignados&id=" + $(this).attr("usuario");
			});
			
			$("#tblUsuarios").DataTable({
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