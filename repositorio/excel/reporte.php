<?php
require_once('Spreadsheet/Excel/Writer.php');

class RReporte{
	private $libro;
	private $consultorio;
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
	
	public function setConsultorio($val = ''){
		if ($val == '') return false;
		$this->consultorio = new TConsultorio($val);
		
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
		if ($this->consultorio->getId() == '') return false;
		if ($this->turno['idTurno'] == '') return false;
		if ($this->cubiculo == '') return false;

		$hoja = &$this->libro->addWorksheet('Reporte');
		
		$titulo = &$this->libro->addFormat();
		$titulo->setHAlign('center');
		
		$head = &$this->libro->addFormat(array('Size' => 10,
			'bold' => 1,
			'Color' => 'red'));
		
		$hoja->write(2, 1, utf8_decode("REPORTE DE CONSULTAS"), $titulo);
		$hoja->mergeCells(2, 1, 2, 37);
		$hoja->setColumn(1, 3, 3);
		$hoja->setColumn(4, 5, 10);
		$hoja->write(3, 1, utf8_decode("CLAVE DE LA UNIDAD: ".$this->consultorio->getClave()."   NOMBRE DE LA UNIDAD: ".$this->consultorio->getNombre()), $head);
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
		
		$dias = &$this->libro->addFormat(array('Size' => 11,
			'bold' => 1,
			"Align" => "center",
			"border" => 1));
		
		
		$hoja->setColumn(6, 36, 3); #Dias
		
		$hoja->mergeCells(5, 1, 5, 5);	
		$hoja->write(5, 1, "", $dias);
		
		for($dia = 1 ; $dia < 32 ; $dia++)
			$hoja->write(5, $dia+5, $dia, $dias);
		
		$hoja->setColumn(37, 37, 7); #Total sobre dias
		$hoja->write(5, $dia+5, "Total", $dias);
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from tipoServicio");
		$cont = 1;
		
		
		$this->libro->setCustomColor(15, 192, 192, 192);
		$formatClasif = array(
			2 => array('FgColor' => "black", 'color' => "white"),
			1 => array('FgColor' => 15)
		);
		
		$objConsulta = new TConsulta;
		while(!$rs->EOF){
			$FormTipoServicio = &$this->libro->addFormat(array_merge(array('Size' => 8, "TextRotation" => 270, "Align" => "vcenter"), $formatClasif[$rs->fields['idClasificacion']]));
			$FormTipoServicio->setTextWrap();
			
			$rsServicios = $db->Execute("select * from servicio where idTipo = ".$rs->fields['idTipo']);
			$hoja->mergeCells($cont+5, 1, $cont + 4 + $rsServicios->RecordCount(), 1);
			$hoja->write($cont+5, 1, utf8_decode($rs->fields['descripcion']), $FormTipoServicio);
			
			while(!$rsServicios->EOF){
				$hoja->setRow($cont+5, 35);
				$hoja->mergeCells($cont+5, 2, $cont+5, 3);
				$FormTipoServicio = &$this->libro->addFormat(array_merge(array('Size' => 8, "Align" => "vcenter"), $formatClasif[$rs->fields['idClasificacion']]));

				$hoja->write($cont+5, 2, $cont, $FormTipoServicio);
				$hoja->mergeCells($cont+5, 4, $cont+5, 5);
				
				$tituloServicios = &$this->libro->addFormat(array('Size' => 8));
				$tituloServicios->setVAlign('top');
				$tituloServicios->setTextWrap();
		
				$hoja->write($cont+5, 4, utf8_decode($rsServicios->fields['nombre']), $tituloServicios);
				$total = 0;
				for($dia = 1 ; $dia < 32 ; $dia++){
					$rsConsulta = $db->Execute("select idConsulta from reporte a join consulta b using(idReporte) where idConsultorio = ".$this->consultorio->getId()." and cubiculo = ".$this->cubiculo." and idTurno = ".$this->turno['idTurno']." and fecha = '".$this->anio."-".$this->mes."-".$dia."' and idServicio = ".$rsServicios->fields['idServicio']." and idDoctor = ".$this->doctor->getId());
				
					$objConsulta = new TConsulta($rsConsulta->fields['idConsulta']);
					$total += $objConsulta->getCantidad();
					$hoja->write($cont+5, $dia+5, $objConsulta->getCantidad() == 0?'':$objConsulta->getCantidad());
				}
				
				$hoja->write($cont+5, $dia+5, $total);
				
				$cont++;
				$rsServicios->moveNext();
			}
			$rs->moveNext();
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