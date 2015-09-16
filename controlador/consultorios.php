<?php
global $objModulo;

switch($objModulo->getId()){
	case 'consultorios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from turno");
		
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idTurno']] = $rs->fields['nombre'];
			$rs->moveNext();
		}
		
		$smarty->assign("turnos", $datos);
		
		$rs = $db->Execute("select * from usuario where idTipo = 2");
		
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$datos[$obj->getId()] = $obj->getNombreCompleto();
			$rs->moveNext();
		}
		
		$smarty->assign("encargados", $datos);
	break;
	case 'listaConsultorios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as turno from consultorio a join turno b using(idTurno) join usuario c on a.idEncargado = c.idUsuario");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cconsultorio':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TConsultorio($_POST['id']);
				$obj->setTurno($_POST['turno']);
				$obj->setEncargado($_POST['encargado']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setCiudad($_POST['ciudad']);
				$obj->setEstado($_POST['estado']);
				$obj->setTurno($_POST['turno']);
				$obj->setCubiculos($_POST['cubiculos']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TConsultorio($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>