$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtApp: "required",
			txtApm: "required"
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Este campo es necesario",
			txtApp: "Este campo es necesario",
			txtApm: "Este campo es necesario"
		},
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.savePersonales(
				$("#txtNombre").val(), 
				$("#txtApp").val(),
				$("#txtApm").val(),
				{
					after: function(datos){
						if (!datos.band){
							alert("Upps... " + datos.mensaje);
						}else{
							alert("Sus datos fueron actualizados exitosamente...");
							
							location.href="index.php?mod=bienvenida";
						}
					}
				}
			);
		}
	});
});