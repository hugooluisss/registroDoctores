$(document).ready(function(){
	$('.panel-heading a').each(function(){
		$(this).parents('.panel').find('.panel-body').slideUp();
		$(this).addClass('panel-collapsed');
		$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
	});
	
	$('.panel-heading a').click(function(e){
		if(!$(this).hasClass('panel-collapsed')) {
			$(this).parents('.panel').find('.panel-body').slideUp();
			$(this).addClass('panel-collapsed');
			$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		}else{
			$(this).parents('.panel').find('.panel-body').slideDown();
			$(this).removeClass('panel-collapsed');
			$(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		}
	});
	
	$("#btnBuscarPorCiudad").click(function(){
		var ciudad = $("#selCiudad").children("option:selected");
		
		$.get("?mod=reporteCiudad&mes=" + $("#selMes").val() + "&anio=" + $("#selAnio").val() + "&estado=" + ciudad.attr("estado") + "&ciudad=" + ciudad.attr("ciudad"), function( data ) {
			$("#dvListaPorCiudad").html(data);
						
			$("#tblRCiudad").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	});
	
	/*Excel general*/
	$("#btnExcelGeneral").click(function(){
		$.post('?mod=creporte&action=generalExcel', {
				"mes": $("#selMesGeneral").val(),
				"anio": $("#selAnioGeneral").val()
			}, function(data){					
				if (data.band == 'false'){
					console.log("Error al generar el archivo de excel");
				}else
					location.href = data.doc;
			}, "json");
	});
});