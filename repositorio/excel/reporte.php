<?php
require_once('Spreadsheet/Excel/Writer.php');

class RReporte{
	private $libro;
	private $reporte;
	private $turno;
	private $cubiculo;
	private $mes;
	private $anio;
	private $doctor;
	
	public function RReporte(){
		$this->cleanFiles();
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.xls');
		$file .= '.xls';		
		
		$this->libro = new Spreadsheet_Excel_Writer($file);
		$this->file = $file;
		$this->setDoctor();
		
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
	
	public function setReporte($val = ''){
		if ($val == '') return false;
		$this->reporte = new TReporte($val);
		
		return true;
	}
	
	public function setDoctor($doc = ''){
		global $sesion;
		if ($doc == '')
			$this->doctor = new TDoctor($sesion['usuario']);
		else
			$this->doctor = new TDoctor($doc);
			
		return true;
	}
	
	public function setTurno($val = ''){
		if ($val == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from turno where idTurno = ".$val);
		$this->turno = $rs->fields;
		
		return true;
	}
	
	public function setCubiculo($val = ''){
		if ($val == '') return false;
		$this->cubiculo = $val;
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
		if ($this->reporte->getId() == '') return false;
		if ($this->turno['idTurno'] == '') return false;
		if ($this->cubiculo == '') return false;

		$hoja = &$this->libro->addWorksheet('Estudiantes');
		
		$titulo = &$this->libro->addFormat();
		$titulo->setHAlign('center');
		
		$head = &$this->libro->addFormat(array('Size' => 10,
			'bold' => 1,
			'Color' => 'red'));
		
		$hoja->write(2, 1, utf8_decode("REPORTE DE CONSULTAS"), $titulo);
		$hoja->mergeCells(2, 1, 2, 37);
		$hoja->setColumn(6, 37, 3); #Dias
		$hoja->setColumn(1, 3, 2);
		$hoja->setColumn(4, 5, 10);
		$hoja->write(3, 1, utf8_decode("CLAVE DE LA UNIDAD: ".$this->reporte->consultorio->getClave()."   NOMBRE DE LA UNIDAD: ".$this->reporte->consultorio->getNombre()), $head);
		$hoja->mergeCells(3, 1, 3, 18);
		$hoja->write(3, 19, utf8_decode("TURNO: ".$this->turno['nombre']), $head);
		$hoja->mergeCells(3, 19, 3, 30);
		$hoja->write(3, 31, utf8_decode("MES A REPORTAR: ".$this->getMesLetra()), $head);
		$hoja->mergeCells(3, 31, 3, 37);
		
		$hoja->write(4, 1, utf8_decode("NOMBRE DEL MÉDICO: ".$this->doctor->getNombre()."   CÉDULA: ".$this->doctor->getCedula()), $head);
		$hoja->mergeCells(4, 1, 4, 18);
		$hoja->write(4, 19, utf8_decode("CONSULTORIO: ".$this->cubiculo), $head);
		$hoja->mergeCells(4, 19, 4, 30);
		$hoja->write(4, 31, utf8_decode("AÑO: ".$this->anio), $head);
		$hoja->mergeCells(4, 31, 4, 37);
		
		$dias = &$this->libro->addFormat(array('Size' => 12,
			'bold' => 1,
			"border" => 1));
		
		for($dia = 1 ; $dia < 32 ; $dia++){
			$hoja->write(5, $dia+5, $dia, $dias);
		}
		
		$hoja->write(5, $dia+5, "Total", $dias);
		
		return true;
	}
	
	public function output(){
		if($this->generar())
			$this->libro->close();
		
		return $this->file;
	}
}
?>