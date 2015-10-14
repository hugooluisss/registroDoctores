$(document).ready(function(){
	$('.panel-heading .btn-clickable').each(function(){
		$(this).parents('.panel').find('.panel-body').slideUp();
		$(this).addClass('panel-collapsed');
		$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
	});
	
	$('.panel-heading .btn-clickable').click(function(e){
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
		
		$.get("?mod=reporteCiudad&mes=" + $("#selMes").val() + "&anio=" + $("#selAnio").val() + "&estado=" + ciudad.attr("estado") + "&ciudad=" + ciudad.attr("estado"), function( data ) {
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
});