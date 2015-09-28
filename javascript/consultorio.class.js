TConsultorio = function(){
	var self = this;
	
	this.add = function(id,	turno, supervisor, responsable, clave, nombre, estado, ciudad, cubiculos, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cconsultorio&action=add', {
				"id": id,
				"turno": turno, 
				"supervisor": supervisor, 
				"responsable": responsable, 
				"clave": clave, 
				"nombre": nombre, 
				"estado": estado, 
				"ciudad": ciudad, 
				"cubiculos": cubiculos
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('?mod=cconsultorio&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el consultorio");
			}
		}, "json");
	};
	
	this.addTurno = function(consultorio, turno, fn){
		$.post('?mod=cconsultorio&action=addTurno', {
			"consultorio": consultorio,
			"turno": turno
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el consultorio");
			}
		}, "json");
	};
	
	this.delTurno = function(consultorio, turno, fn){
		$.post('?mod=cconsultorio&action=delTurno', {
			"consultorio": consultorio,
			"turno": turno
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el consultorio");
			}
		}, "json");
	};
};