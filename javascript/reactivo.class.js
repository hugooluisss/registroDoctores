TReactivo = function(){
	var self = this;
	
	this.add = function(id, examen, instrucciones, valor, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=creactivos&action=add', {
				"instrucciones": instrucciones,
				"puntos": valor,
				"id": id,
				"examen": examen
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al agregar el reactivo " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=creactivos&action=del', {
				"id": id
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al eliminar el reactivo " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.setPosicion = function(id, pos, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=creactivos&action=setPosicion', {
				"id": id,
				"posicion": pos
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al eliminar el reactivo " + data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
};