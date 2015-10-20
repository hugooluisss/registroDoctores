<?php
require_once('Spreadsheet/Excel/Writer.php');

class RReporte{
	private $libro;
	private $mes;
	private $anio;
	
	public function RReporte(){
		$this->cleanFiles();
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.xls');
		$file .= '.xls';
		
		$this->libro = new Spreadsheet_Excel_Writer($file);
		$this->file = $file;
		
		return true;
	}
	
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.xls'){
         	$path = $dir.'/'.$file;
         	if($t-filemtime($path)>3600)
             	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function setMes($val = ''){
		if ($val == '') return false;
		$this->mes = $val;
	}
	
	public function getMes(){
		return $this->mes;
	}
	
	public function getMesLetra(){
		if ($this->getMes() == '') return false;
		
		$mes = array(
			1  => "Enero",
			2  => "Febrero",
			3  => "Marzo",
			4  => "Abril",
			5  => "Mayo",
			6  => "Junio",
			7  => "Julio",
			8  => "Agosto",
			9  => "Septiembre",
			10 => "Octubre",
			11 => "Noviembre",
			12 => "Diciembre"
		);
		
		return $mes[$this->getMes()];
	}
	
	public function setAnio($val = ''){
		if ($val == '') return false;
		$this->anio = $val;
	}
	
	public function generar(){
		/*Primero hay que checar si es supervisor o administrador*/
		global $sesion;
		$supervisor = new TUsuario($sesion['usuario']);

		$hoja = &$this->libro->addWorksheet('Reporte');
		
		$head = &$this->libro->addFormat(array('Size' => 8,
			'bold' => 1,
			'Color' => 'red'));
		$this->libro->setCustomColor(15, 192, 192, 192);
				
		$titulo = &$this->libro->addFormat(array('Size' => 8,
			'bold' => 1,
			"Align" => "center",
			"border" => 1,
			"FgColor" => 15));
			
		$encabezado = &$this->libro->addFormat(array('Size' => 10,
			'bold' => 1,
			"Align" => "center",
			"FgColor" => 15));
			
		$hoja->write(2, 1, utf8_decode("REPORTE DE CONSULTAS GENERAL"), $encabezado); $hoja->mergeCells(2, 1, 2, 9);
		$hoja->write(3, 1, utf8_decode("Generado el: ".date("Y-m-d")), $head); $hoja->mergeCells(3, 1, 3, 9);
			
		$titulo->setAlign("vcenter");
		
		$db = TBase::conectaDB();
		
		switch($supervisor->getIdTipo()){
			case 1:
				$rs = $db->Execute("select idConsultorio, idDoctor, idServicio, sum(cantidad) as cantidad from reporte a join consulta b using(idReporte) join consultorio d using(idConsultorio) join servicio e using(idServicio) join tipoServicio f using(idTipo) join clasificacion g using(idClasificacion) where extract(month from fecha) = ".$this->mes." and extract(year from fecha) = ".$this->anio." group by idConsultorio, idDoctor, idServicio");
			break;
			case 2:
				$rs = $db->Execute("select idConsultorio, idDoctor, idServicio, sum(cantidad) as cantidad from reporte a join consulta b using(idReporte) join consultorio d using(idConsultorio) join servicio e using(idServicio) join tipoServicio f using(idTipo) join clasificacion g using(idClasificacion) where extract(month from fecha) = ".$this->mes." and extract(year from fecha) = ".$this->anio." and idSupervisor = ".$supervisor->getId()." group by idConsultorio, idDoctor, idServicio");
			break;
			default:
				return false;
		}
		
		$hoja->write(4, 1, utf8_decode("Estado"), $titulo); $hoja->mergeCells(4, 1, 5, 1);
		$hoja->write(4, 2, utf8_decode("Ciudad"), $titulo); $hoja->mergeCells(4, 2, 5, 2);
		$hoja->write(4, 3, utf8_decode("Consultorio"), $titulo); $hoja->mergeCells(4, 3, 4, 4);
		$hoja->write(5, 3, utf8_decode("Clave"), $titulo);
		$hoja->write(5, 4, utf8_decode("Nombre"), $titulo);
		$hoja->write(4, 5, utf8_decode("Doctor"), $titulo); $hoja->mergeCells(4, 5, 4, 6);
		$hoja->write(5, 5, utf8_decode("Nombre"), $titulo);
		$hoja->write(5, 6, utf8_decode("EMail"), $titulo);
		$hoja->write(4, 7, utf8_decode("Servicio"), $titulo); $hoja->mergeCells(4, 7, 4, 8);
		$hoja->write(5, 7, utf8_decode("Tipo"), $titulo);
		$hoja->write(5, 8, utf8_decode("Nombre"), $titulo);
		$hoja->write(4, 9, utf8_decode("Cantidad"), $titulo); $hoja->mergeCells(4, 9, 5, 9);
		
		$datos = &$this->libro->addFormat(array('Size' => 8,
			"border" => 1));
		
		$hoja->setColumn(4, 8, 30);
		
		$y = 6;
		while(!$rs->EOF){
			$consultorio = new TConsultorio($rs->fields['idConsultorio']);
			$servicio = new TServicio($rs->fields['idServicio']);
			$doctor = new TDoctor($rs->fields['idDoctor']);
			
			$hoja->write($y, 1, utf8_decode($consultorio->getEstado()), $datos);
			$hoja->write($y, 2, utf8_decode($consultorio->getCiudad()), $datos);
			$hoja->write($y, 3, utf8_decode($consultorio->getClave()), $datos);
			$hoja->write($y, 4, utf8_decode($consultorio->getNombre()), $datos);
			$hoja->write($y, 5, utf8_decode($doctor->getNombre()), $datos);
			$hoja->write($y, 6, utf8_decode($doctor->getEmail()), $datos);
			$hoja->write($y, 7, utf8_decode($servicio->tipo->getDescripcion()), $datos);
			$hoja->write($y, 8, utf8_decode($servicio->getNombre()), $datos);
			$hoja->write($y, 9, utf8_decode($rs->fields["cantidad"]), $datos);
			$rs->moveNext();
			$y++;
		}
				
		return true;
	}
	
	public function output(){
		if($this->generar())
			$this->libro->close();
		
		return $this->file;
	}
}
?>