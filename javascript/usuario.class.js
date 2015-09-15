TUsuario = function(){
	var self = this;
	
	this.add = function(id,	nombre, app, apm, email, pass, cedula, universidad, especialidad, tipo, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cusuarios&action=add', {
				"id": id,
				"nombre": nombre,
				"app": app, 
				"apm": apm, 
				"email": email, 
				"pass": pass, 
				"cedula": cedula, 
				"universidad": universidad,
				"especialidad": especialidad, 
				"tipo": tipo
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(usuario, fn){
		$.post('?mod=cusuarios&action=del', {
			"usuario": usuario,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
	
	this.login = function(usuario, pass, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=clogin&action=login', {
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
};