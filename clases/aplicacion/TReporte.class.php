<?php
/**
* TReporte
* Reportes que hacen los doctores
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TUsuario.class.php");

class TReporte{
	private $idReporte;
	public $doctor;
	public $consultorio;
	private $fecha;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TReporte($id = ''){
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
				
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from reporte where idReporte = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idDoctor':
					$this->setDoctor($val);
				break;
				case 'idConsultorio':
					$this->setConsultorio($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idReporte;
	}
	
	/**
	* Establece el objeto doctor
	*
	* @autor Hugo
	* @access public
	* @param string $val identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDoctor($val = ''){
		$this->doctor = new TDoctor($val);
		return true;
	}
	
	/**
	* Establece el objeto consultorio
	*
	* @autor Hugo
	* @access public
	* @param string $val identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setConsultorio($val = ''){
		$this->consultorio = new TConsultorio($val);
		return true;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val fecha
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ''){
		$this->fecha = $val;
		return true;
	}
	
	/**
	* retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return date fecha
	*/
	
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->doctor->getId() == '' or $this->consultorio->getId() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO reporte(idDoctor, idConsultorio)VALUES(".$this->doctor->getId().", ".$this->consultorio->getId().");");
			
			if (!$rs) return false;
			
			$this->idReporte = $db->Insert_ID();
		}		

		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE reporte
			SET
				fecha = ".($this->getFecha() == ''?'now()':("'".$this->getFecha()."'")).",
				idConsultorio = '".$this->consultorio->getId()."'
			WHERE idReporte = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from reporte where idReporte = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Agregar una consulta
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addConsulta($servicio = '', $turno = '', $cantidad = 0){
		if ($this->getId() == '') return false;
		if ($turno == '') return false;
		if ($servicio == '') return false;
		
		$obj = new TConsulta();
		$obj->setIdReporte($this->getId());
		$obj->setServicio($servicio);
		$obj->setTurno($turno);
		$obj->setCantidad($cantidad);
		
		return $obj->guardar();
	}
}