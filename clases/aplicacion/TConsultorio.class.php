<?php
/**
* TConsultorio
* Consultorio
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TConsultorio{
	private $idConsultorio;
	public $supervisor;
	public $responsable;
	private $clave;
	private $nombre;
	private $estado;
	private $ciudad;
	private $cubiculos;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TConsultorio($id = ''){
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
		$rs = $db->Execute("select * from consultorio where idConsultorio = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idEncargado': $this->encargado = new TUsuario($val); break;
				case 'idSupervisor': $this->supervisor = new TUsuario($val); break;
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
		return $this->idConsultorio;
	}
	
	/**
	* Establece el usuario encargado de sanidad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setResponsable($val = ''){
		$this->responsable = new TUsuario($val);
		return true;
	}
	
	/**
	* Establece el usuario supervisor encargado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSupervisor($val = ''){
		$this->supervisor = new TUsuario($val);
		return true;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setClave($val = ''){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getClave(){
		return $this->clave;
	}
	
	/**
	* Establece el nombre
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado;
	}
	
	/**
	* Establece la ciudad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCiudad($val = ''){
		$this->ciudad = $val;
		return true;
	}
	
	/**
	* Retorna la ciudad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCiudad(){
		return $this->ciudad;
	}
	
	/**
	* Establece la cantidad de cubiculos
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCubiculos($val = ''){
		$this->cubiculos = $val;
		return true;
	}
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCubiculos(){
		return $this->cubiculos;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->responsable->getId() == '' or $this->supervisor->getId() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO consultorio(idResponsable, idSupervisor)VALUES(".$this->responsable->getId().", ".$this->supervisor->getId().");");
			if (!$rs) return false;
				
			$this->idConsultorio = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE consultorio
			SET
				idResponsable = ".$this->responsable->getId().",
				idSupervisor = ".$this->supervisor->getId().",
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				estado = '".$this->getEstado()."',
				ciudad = '".$this->getCiudad()."',
				cubiculos = ".$this->getCubiculos()."
			WHERE idConsultorio = ".$this->getId());
			
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
		$rs = $db->Execute("delete from consultorio where idConsultorio = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Agrega un turno
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addTurno($turno = ''){
		if ($this->getId() == '' or $turno == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idTurno from consultorioTurno where idTurno = ".$turno." and idConsultorio = ".$this->getId());
		if (!$rs->EOF) return false;
		
		$rs = $db->Execute("insert into consultorioTurno(idConsultorio, idTurno) values (".$this->getId().", ".$turno.")");
		
		return $rs?true:false;
	}
	
	/**
	* Elimina un turno
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function delTurno($turno = ''){
		if ($this->getId() == '' or $turno == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from consultorioTurno where idConsultorio = ".$this->getId()." and idTurno = ".$turno);
		
		return $rs?true:false;
	}
}
?>