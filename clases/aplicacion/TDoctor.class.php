<?php
/**
* Tdoctor
* Usuarios del sistema
* @package aplicacion
* @extends TUsuario
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TUsuario.class.php");

class TDoctor extends TUsuario{
	private $cedula;
	private $universidad;
	private $especialidad;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TDoctor($id = ''){
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
		
		parent::setId($id);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from doctor where idUsuario = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/*
	* Establece el valor del número de cédula
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCedula($val = ''){
		$this->cedula = $val;
		return true;
	}
	
	/**
	* Retorna el valor de cédula
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCedula(){
		return $this->cedula;
	}
	
	/*
	* Establece el valor de universidad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUniversidad($val = ''){
		$this->universidad = $val;
		return true;
	}
	
	/**
	* Retorna el valor de universidad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getUniversidad(){
		return $this->universidad;
	}
	
	/*
	* Establece el valor de la especialidad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEspecialidad($val = ''){
		$this->especialidad = $val;
		return true;
	}
	
	/**
	* Retorna el valor de especialidad del doctor
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEspecialidad(){
		return $this->especialidad;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if (!parent::guardar()) return false;
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idUsuario from doctor where idUsuario = ".$this->getId());
		
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO doctor(idUsuario)VALUES(".$this->getId().");");
			if (!$rs) return false;
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE doctor
			SET
				cedula = '".$this->getCedula()."',
				universidad = '".$this->getUniversidad()."',
				especialidad = '".$this->getEspecialidad()."'
			WHERE idUsuario = ".$this->getId());
			
		return $rs?true:false;
	}
}
?>