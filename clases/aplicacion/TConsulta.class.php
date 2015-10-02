<?php
/**
* TConsulta
* Reportes que hacen los doctores
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TUsuario.class.php");

class TConsulta{
	private $idConsulta;
	private $idReporte;
	public $servicio;
	private $hora;
	public $turno;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TConsulta($id = ''){
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
		$rs = $db->Execute("select * from consulta where idConsulta = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idServicio':
					$this->setServicio($val);
				break;
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
		return $this->idConsulta;
	}
	
	/**
	* Establece el identificador del reporte
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setIdReporte($val = ''){
		$this->idReporte = $val;
		return true;
	}
	
	/**
	* Establece el servicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setServicio($val = ''){
		$this->servicio = new TServicio($val);
		return true;
	}
	
	/**
	* Retorna el idReporte
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getIdReporte(){
		return $this->idReporte;
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
		$this->turno = new TTurno($val);
		return true;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getIdReporte() == '' or $this->servicio->getId() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO consulta(idReporte, idServicio)VALUES(".$this->getIdReporte().", ".$this->servicio->getId().");");
			if (!$rs) return false;
				
			$this->idReporte = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE consulta
			SET
				hora = now(),
				turno = , ".$this->turno->getId()."
				idServicio = '".$this->servicio->getId()."'
			WHERE idConsulta = ".$this->getId());
			
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
		$rs = $db->Execute("delete from consulta where idConsulta = ".$this->getId());
		
		return $rs?true:false;
	}
}