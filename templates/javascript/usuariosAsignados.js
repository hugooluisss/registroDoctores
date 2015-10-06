$(document).ready(function(){
	getLista();
	
	$("#txtNombre").autocomplete({
		source: "index.php?mod=cusuarios&action=autocomplete&sup=" + $("#id").val(),
		minLength: 2,
		select: function(e, el){
			$("#txtNombre").val("");
			var obj = new TUsuario;
			obj.supervisarA($("#id").val(), el.item.identificador, {
				after: function(data){
					if (! data.band)
						alert("No se pudo realizar la asignación, intentelo nuevamente");
					else{
						$("#txtNombre").val("");
						getLista();
					}
				}
			});
		}
	});
	
	function getLista(){
		$.get("?mod=listaAsignados", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUsuario;
					obj.sinSupervisarA($("#id").val(), $(this).attr("usuario"), {
						after: function(data){
							if (data.band)
								getLista();
							else
								alert("No se realizó la eliminación");
						}
					});
				}
			});
		});
	}
	
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