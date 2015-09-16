TServicio = function(){
	var self = this;
	
	this.add = function(id,	tipo, nombre, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cservicio&action=add', {
				"id": id,
				"tipo": tipo,
				"nombre": nombre
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('?mod=cservicio&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el servicio");
			}
		}, "json");
	};
};