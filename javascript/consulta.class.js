TConsulta = function(){
	var self = this;
	
	this.getPanelAdd = function(consultorio, div){
		$.get("?mod=panelConsulta&id=" + consultorio, function( data ) {
			$("#" + div).html(data);
		});
	}
	
	this.add = function(consultorio, turno, fecha, servicio, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cconsulta&action=add', {
				"consultorio": consultorio,
				"turno": turno,
				"fecha": fecha,
				"servicio": servicio
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
};