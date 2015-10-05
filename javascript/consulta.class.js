TConsulta = function(){
	var self = this;
	
	this.getPanelAdd = function(consultorio, div, fn){
		$.get("?mod=panelConsulta&id=" + consultorio, function( data ) {
			$("#" + div).html(data);
			
			if (fn.after !== undefined)
				fn.after(data);
		});
	}
	
	this.add = function(consultorio, turno, fecha, cantidad, servicio, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cconsultas&action=add', {
				"consultorio": consultorio,
				"turno": turno,
				"fecha": fecha,
				"cantidad": cantidad,
				"servicio": servicio
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
};