$(document).ready(function(){
	$("a[action=changePass]").click(function(){
		var pass1 = prompt("Escribe la nueva contraseña");
		var pass2 = prompt("Confirmela");
		
		if (pass1 == pass2 && pass1 != null && pass2 != null){
			var obj = new TUsuario;
			obj.savePass(
				pass1,
				{
					after: function(datos){
						if (!datos.band){
							alert("Upps... " + datos.mensaje);
						}else{
							alert("La contraseña fue cambiada, el sistema se reiniciará...");
							
							location.href="index.php?mod=logout";
						}
					}
				}
			);
		}else
			alert("Las contraseñas no coinciden");
			
	});
});