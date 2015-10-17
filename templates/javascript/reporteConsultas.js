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
				"paging": false,
				"lengthChange": false,
				"ordering": false,
				"info": true,
				"autoWidth": true
			});
			
			$("[action=excel]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				var obj = new TUsuario;
				
				obj.reportar("no", el.idDoctor, el.idConsultorio, el.idTurno, el.cubiculo, $("#selMes").val(), $("#selAnio").val(), {
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
			
			$("[action=email]").click(function(){
				if (confirm("El reporte será enviado por correo electrónico al supervisor del consultorio, ¿estás seguro?")){
					var el = jQuery.parseJSON($(this).attr("datos"));
					var obj = new TUsuario;
					
					obj.reportar("si", el.idDoctor, el.idConsultorio, el.idTurno, el.cubiculo, $("#selMes").val(), $("#selAnio").val(), {
						before: function(){
						},
						after: function(data){
							if (!data.band)
								alert("Error al generar el reporte y/o enviarlo por correo electrónico");
							else{
								alert("El correo fue enviado con éxito");
							}
						}
					});
				}
			});
			
		});
	}
});