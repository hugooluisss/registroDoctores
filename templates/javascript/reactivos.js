$(document).ready(function(){
	$("#txtInstrucciones").wysihtml5();	
	getListaMedios();
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
			txtInstrucciones: "required",
			selValor: "required",
		},
		wrapper: 'span', 
		messages: {
			txtInstrucciones: "Este campo es necesario",
			selValor: "Indica el valor en puntos"
		},
		submitHandler: function(form){
			var obj = new TReactivo;
			
			obj.add(
				$('#id').val(),
				$('#examen').val(),
				$('#txtInstrucciones').val(),
				$('#selValor').val(),{
					before: function(){
						$("#frmAdd").disabled = true;
					},
					after: function(data){
						$("#frmAdd").disabled = true;
						
						if (data.band){
							$("#frmAdd").get(0).reset();
							getLista();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else
							alert("No se pudo agregar el reactivo");
					}
				});
        }
    });
    
    function getLista(){
		$.get("?mod=listaReactivos&examen=" + $("#examen").val(), function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TReactivo;
					obj.del($(this).attr("objeto"), {
						after: function(data){
							if (data.band)
								getLista();
							else
								alert("Upps... ocurrió un error al intentar borrar el reactivo");
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$('#panelTabs a[href="#add"]').tab('show');
				
				$('#id').val(el.idReactivo);
				$('.wysihtml5-sandbox').contents().find('body').html(el.instrucciones);
				$('#selValor').val(el.valor);
				
				$('#txtInstrucciones').select();
			});
			
			$(".posicion").change(function(){
				var obj = new TReactivo;
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
							alert("Upps... No se pudo actualizar el valor de la posición del reactivo");
						}
					}
				});
			});
			
			$("[action=reactivos]").click(function(){
				location.href = "?mod=opciones&reactivo=" + $(this).attr("objeto");
			});
			
			$("#tblReactivos").DataTable({
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