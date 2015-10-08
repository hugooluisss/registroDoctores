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
			
		});
	}
});