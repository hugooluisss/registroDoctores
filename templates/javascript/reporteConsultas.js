$(document).ready(function(){
	$("#btnBuscar").click(function(){
		getLista($("#selMes").val(), $("#selAnio").val());
	});
	
	function getLista(mes, anio){
		$.get("?mod=listaReportes&mes=" + mes + "&anio=" + anio, function( data ) {
			$("#dvLista").html(data);
						
			$("#tblReportes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			
			$("[action=excel]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				var obj = new TUsuario;
				
				obj.reportar("si", el.idDoctor, el.idConsultorio, el.idTurno, el.cubiculo, $("#selMes").val(), $("#selAnio").val(), {
					before: function(){
					},
					after: function(data){
						if (data.doc == "")
							alert("Error al generar el reporte");
						else{
							location.href = data.doc;
						}
					}
				});
			});
			
		});
	}
});