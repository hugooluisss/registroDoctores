<?php
/**
* Tusuario
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TUsuario{
	private $idUsuario;
	private $idTipo;
	private $app;
	private $apm;
	private $nombre;
	private $email;
	private $pass;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TUsuario($id = ''){
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
		$rs = $db->Execute("select * from usuario where idUsuario = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
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
		return $this->idUsuario;
	}
	
	/**
	* Establece el valor de tipo de usuario
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = 2){
		$this->idTipo = $val;
		return true;
	}
	
	/**
	* Retorna las el identificador del tipo de usuario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getIdTipo(){
		return $this->idTipo;
	}
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		if ($this->getIdTipo() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select nombre from tipoUsuario where idTipoUsuario = ".$this->getIdTipo());
		return $rs->fields['nombre'];
	}
	
	/**
	* Establece el apellido paterno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApp($val = ''){
		$this->app = $val;
		return true;
	}
	
	/**
	* Retorna el apellido paterno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApp(){
		return $this->app;
	}
	
	/**
	* Establece el apellido materno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApm($val = ''){
		$this->apm = $val;
		return true;
	}
	
	/**
	* Retorna las instrucciones
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApm(){
		return $this->apm;
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
	* Retorna el nombre completo iniciando por nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombreCompleto(){
		return $this->getNombre()." ".$this->getApp()." ".$this->getApm();
	}
	
	/**
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el valor del password
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPass($val = ''){
		$this->pass = $val;
		return true;
	}
	
	/**
	* Retorna el password
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPass(){
		return $this->pass;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getIdTipo() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO usuario(idTipo)VALUES(".$this->getIdTipo().");");
			if (!$rs) return false;
				
			$this->idUsuario = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE usuario
			SET
				idTipo = ".$this->getIdTipo().",
				nombre = '".$this->getNombre()."',
				app = '".$this->getApp()."',
				apm = '".$this->getApm()."',
				email = '".$this->getEmail()."',
				pass = '".$this->getPass()."'
			WHERE idUsuario = ".$this->getId());
			
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
		$rs = $db->Execute("delete from usuario where idUsuario = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Agregar a doctor a supervisor
	*
	* @autor Hugo
	* @access public
	* @param $id Identificador del usuario doctor
	* @return boolean True si se realizó sin problemas
	*/

	public function addSupervisado($id = ''){
		if ($id == '') return false;
		
		if ($this->getId() == '' or $this->getIdTipo() <> 2) return false;
		
		$obj = new TUsuario($id);
		if ($obj->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into encargados(idSupervisor, idUsuario) values (".$this->getId().", ".$id.")");
		
		return $rs?true:false;
	}
	
	/**
	* Eliminar a doctor a supervisor
	*
	* @autor Hugo
	* @access public
	* @param $id Identificador del usuario doctor
	* @return boolean True si se realizó sin problemas
	*/

	public function delSupervisado($id = ''){
		if ($id == '') return false;
		
		if ($this->getId() == '' or $this->getIdTipo() <> 2) return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from encargados where idSupervisor = ".$this->getId()." and idUsuario = ".$id);
		
		return $rs?true:false;
	}
}
?>