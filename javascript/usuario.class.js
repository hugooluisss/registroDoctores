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
	
	this.supervisarA = function(supervisor, doctor, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cusuarios&action=addsup', {
			"supervisor": supervisor,
			"doctor": doctor
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("No se agregó la supervisión");
			}
		}, "json");
	}
	
	this.sinSupervisarA = function(supervisor, doctor, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cusuarios&action=delsup', {
			"supervisor": supervisor,
			"doctor": doctor
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("No se eliminó el registro");
			}
		}, "json");
	}
	
	this.reportar = function(email, usuario, consultorio, turno, cubiculo, mes, anio, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=creporte&action=generarExcel', {
			"enviar": email,
			"usuario": usuario,
			"consultorio": consultorio, 
			"cubiculo": cubiculo,
			"turno": turno,
			"mes": mes,
			"anio": anio
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Error al generar el archivo de excel");
			}
		}, "json");
	}
};