TOpcion = function(){
	var self = this;
	
	this.add = function(id, reactivo, texto, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=copciones&action=add', {
				"texto": texto,
				"id": id,
				"reactivo": reactivo
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al agregar la opción " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=copciones&action=del', {
				"id": id
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al eliminar la opción " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.setPosicion = function(id, pos, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=copciones&action=setPosicion', {
				"id": id,
				"posicion": pos
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al eliminar la opción" + data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
};