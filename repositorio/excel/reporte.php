<?php
require_once('Spreadsheet/Excel/Writer.php');

class RReporte{
	private $libro;
	private $reporte;
	private $turno;
	private $cubiculo;
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
	
	public function setReporte($val = ''){
		if ($val == '') return false;
		$this->reporte = new TReporte($val);
		
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
	
	public function generar(){
		if ($this->reporte->getId() == '') return false;
		if ($this->turno['idTurno'] == '') return false;
		if ($this->cubiculo == '') return false;
		
		
	}
	
	public function output(){
		$this->generar();
		$this->libro->close();
		
		return $this->file;
	}
}
?>