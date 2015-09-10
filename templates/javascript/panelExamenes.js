$(document).ready(function(){
	getLista();
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtPeriodo: "required",
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Este campo es necesario",
			txtPeriodo: "Este campo es necesario"
		},
		submitHandler: function(form){
			var obj = new TExamen;
			
			tiempo = $("#selHoras").val() * 60 + $("#selMinutos").val();
			obj.add(
				$('#id').val(),
				$('#txtNombre').val(),
				$('#txtPeriodo').val(),
				tiempo,
				$('#txtDescripcion').val(),{
					before: function(){
						$("#frmAdd").disabled = true;
					},
					after: function(data){
						$("#frmAdd").disabled = true;
						
						if (data.band){
							$("#frmAdd").get(0).reset()
							getLista();
						}
					}
				});
        }

    });
	
	function getLista(){
		$.get("?mod=listaExamenes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TExamen;
					obj.del($(this).attr("examen"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$('#id').val(el.idExamen);
				$('#txtNombre').val(el.nombre);
				$('#txtPeriodo').val(el.periodo);
				$('#txtDescripcion').val(el.descripcion);
				$("#selHoras").val(el.tiempo / 60);
				$("#selMinutos").val(el.tiempo % 60);
				
				$('#txtNombre').select();
			});
			
			$("[action=reactivos]").click(function(){
				location.href = "?mod=reactivos&examen=" + $(this).attr("examen");
			});
						
			$("#tblExamenes").DataTable({
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