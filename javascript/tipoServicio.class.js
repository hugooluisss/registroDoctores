TTipoServicio = function(){
	var self = this;
	
	this.add = function(id,	nombre, clasificacion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=ctipoServicio&action=add', {
				"id": id,
				"nombre": nombre,
				"clasificacion": clasificacion
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('?mod=ctipoServicio&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el tipo de servicio");
			}
		}, "json");
	};
};