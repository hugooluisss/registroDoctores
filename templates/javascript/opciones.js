$(document).ready(function(){
	$("#txtTexto").wysihtml5();
	getLista();
	getListaMedios();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").submit(function(){
		if ($("#txtTexto").val() == ''){
			$("#txtTexto").focus();
			alert("Ingresa un texto");
		}else{
			var obj = new TOpcion;
			
			obj.add($("#id").val(), $("#reactivo").val(), $("#txtTexto").val(), {
				before: function(){
					$("#frmAdd").disabled = true;
				},
				after: function(data){
					$("#frmAdd").disabled = false;
					
					if(data.band){
						$("#frmAdd").get(0).reset();
						getLista();
						$('#panelTabs a[href="#listas"]').tab('show');
					}else{
						alert("Upss... no se pudo agregar la opción");
					}
				}
			});
		}
	});
	
	function getLista(){
		$.get("?mod=listaOpciones&reactivo=" + $("#reactivo").val(), function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TOpcion;
					obj.del($(this).attr("objeto"), {
						after: function(data){
							if (data.band)
								getLista();
							else
								alert("Upps... ocurrió un error al intentar borrar la opción");
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$('#panelTabs a[href="#add"]').tab('show');
				
				$('#id').val(el.idOpcion);
				$('.wysihtml5-sandbox').contents().find('body').html(el.texto);
				
				$('#txtTexto').select();
			});
			
			$(".posicion").change(function(){
				var obj = new TOpcion;
				var el = $(this);
				obj.setPosicion($(this).attr("objeto"), $(this).val(), {
					before: function(){
						el.disabled = true;
					},
					after: function(data){
						el.disabled = false;
						if (data.band)
							$(this).attr("valAnterior", el.val());
						else{
							el.val(el.attr("valAnterior"));
							alert("Upps... No se pudo actualizar el valor de la posición de la opción");
						}
					}
				});
			});
			
			$("#tblopciones").DataTable({
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

$(document).ready(function(){
	$('#fileupload').fileupload({
        url: "?mod=cmedios&action=upload&examen=" + $("#examen").val(),
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                //$('<p/>').text(file.name).appendTo('#files');
                if (file.error !== undefined)
                	alert("Upps... ocurrió un error al subir el archivo " + file.name + ": " + file.error);
                	
                getListaMedios();
            });
            
            
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );	
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

});

function getListaMedios(){
	$.get("?mod=listaMedios&examen=" + $("#examen").val(), function( data ) {
		$("#dvListaMedios").html(data);
		
		$("[action=eliminar]").click(function(){
			var obj = new TMultimedia;
			if (confirm("¿Seguro?"))
				obj.del($(this).attr("nombre"), $("#examen").val(), {after: function(data){
					if (data.band)
						getListaMedios();
				}});
		});
	});
}