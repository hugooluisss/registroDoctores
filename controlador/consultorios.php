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
		
		$rs = $db->Execute("select * from usuario where idTipo = 2 order by nombre, app, apm");
		
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$datos[$obj->getId()] = $obj->getNombreCompleto();
			$rs->moveNext();
		}
		
		$smarty->assign("supervisor", $datos);
		
		$rs = $db->Execute("select * from usuario order by nombre, app, apm");
		
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$datos[$obj->getId()] = $obj->getNombreCompleto();
			$rs->moveNext();
		}
		
		$smarty->assign("responsable", $datos);
		
		$rs = $db->Execute("select * from turno");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("turnos", $datos);
	break;
	case 'listaConsultorios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from consultorio a join usuario c on a.idSupervisor = c.idUsuario");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			$rsT = $db->Execute("select * from consultorioTurno where idConsultorio = ".$rs->fields['idConsultorio']);
			$turnos = array();
			
			while(!$rsT->EOF){
				array_push($turnos, $rsT->fields);
				$rsT->moveNext();
			}
			
			$rs->fields['turnos'] = json_encode($turnos);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cconsultorio':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TConsultorio($_POST['id']);
			
				$obj->setSupervisor($_POST['supervisor']);
				$obj->setResponsable($_POST['responsable']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setCiudad($_POST['ciudad']);
				$obj->setEstado($_POST['estado']);
				$obj->setCubiculos($_POST['cubiculos']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TConsultorio($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'addTurno':
				$obj = new TConsultorio($_POST['consultorio']);
				echo json_encode(array("band" => $obj->addTurno($_POST['turno'])));
			break;
			case 'delTurno':
				$obj = new TConsultorio($_POST['consultorio']);
				echo json_encode(array("band" => $obj->delTurno($_POST['turno'])));
			break;
		}
	break;
}
?>