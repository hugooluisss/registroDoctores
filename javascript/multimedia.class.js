TMultimedia = function(){
	var self = this;
	
	this.del = function(nombre, examen, fn){
		$.post('?mod=cmedios&action=del&examen=' + examen, {
			"nombre": nombre
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == false){
				alert("Ocurrió un error al eliminar el objeto");
			}
		}, "json");
	};
};