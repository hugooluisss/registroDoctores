<?php
/**
* TServicio
* Clasificación de servicios
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TServicio{
	private $idServicio;
	public $tipo;
	private $nombre;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TServicio($id = ''){
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
		$rs = $db->Execute("select * from servicio where idServicio = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idTipo': $this->tipo = new TTipoServicio($val); break;
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
		return $this->idServicio;
	}
	
	/**
	* Establece el tipo de servicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = ''){
		$this->tipo = new TTipoServicio($val);
		return true;
	}
	
	/**
	* Establece el nombre
	*
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
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->tipo->getId() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO servicio(idTipo)VALUES(".$this->tipo->getId().");");
			if (!$rs) return false;
				
			$this->idServicio = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE servicio
			SET
				idTipo = ".$this->tipo->getId().",
				nombre = '".$this->getNombre()."'
			WHERE idServicio = ".$this->getId());
			
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
		$rs = $db->Execute("delete from servicio where idServicio = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>