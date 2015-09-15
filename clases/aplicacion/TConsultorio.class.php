<?php
/**
* TConsultorio
* Consultorio
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TConsultorio{
	private $idConsultorio;
	private $idTurno;
	public $encargado;
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
		
		parent::setId($id);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from servicio where idTipo = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idEncargado': $this->encargado = new TUsuario($val); break;
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
	* Establece el turno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTurno($val = ''){
		$this->idTurno = $val;
		return true;
	}
	
	/**
	* Retorna el identificador del turno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getIdTurno(){
		return $this->idTurno;
	}
	
	/**
	* Retorna el nombre del turno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTurno(){
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from turno where idTurno = ".$val);

		return $rs->fields['nombre'];
	}
	
	/**
	* Establece el usuario supervisor encargado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEncargado($val = ''){
		$this->encargado = new TUsuario($val);
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
		if ($this->tipo->getId() == '' or $this->getIdTurno() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO consultorio(idTurno, idEncargado)VALUES(".$this->getIdTurno().", ".$this->encargado->getId().");");
			if (!$rs) return false;
				
			$this->idConsultorio = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE consultorio
			SET
				idTurno = ".$this->getIdTurno().",
				idEncargado = ".$this->encargado->getId().",
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
}
?>