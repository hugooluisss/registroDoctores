$(document).ready(function(){
	getLista();
	
	$("#txtNombre").autocomplete({
		source: "index.php?mod=cusuarios&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			$("#txtCliente").val(el.item.label);
			$("#txtCliente").attr("idCliente", el.item.identificador);
		}
	});
	
	function getLista(){
		$.get("?mod=listaAsignados", function( data ) {
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
		});
	}
});