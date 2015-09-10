TExamen = function(){
	var self = this;
	
	this.add = function(id, nombre, periodo, tiempo, descripcion, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=cexamenes&action=add', {
				"id": id,
				"nombre": nombre,
				"periodo": periodo,
				"tiempo": tiempo,
				"descripcion": descripcion
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al agregar el examen " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('?mod=cexamenes&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el examen");
			}
		}, "json");
	};
};