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
	
	
	
	public function add(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("INSERT INTO usuario(num_personal, idTipo, alta, ultAcceso) VALUES(".$this->getId().", 2, now(), null);");
		
		return $rs?true:false;
	}
	
	public function del(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from usuario where num_personal = ".$this->getId()."");
		
		return $rs?true:false;
	}
}
?>