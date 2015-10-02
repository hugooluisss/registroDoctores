<?php
global $objModulo;

switch($objModulo->getId()){
	case 'consultas':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from consultorio where idConsultorio in (select idConsultorio from consultorioTurno)");
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("consultorios", $datos);
	break;
	case 'panelConsulta':
		$consultorio = new TConsultorio($_GET['id']);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from consultorioTurno a join turno b using(idTurno) where idConsultorio = ".$consultorio->getId());
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idTurno']] = $rs->fields['nombre'];
			
			$rs->moveNext();
		}
		
		$smarty->assign("turnos", $datos);
		
		$rs = $db->Execute("select * from servicio a join tiposervicio b using(idTipo) order by descripcion, nombre");
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idServicio']] = $rs->fields;
			
			$rs->moveNext();
		}
		
		$smarty->assign("servicios", $datos);
		
	break;
	case 'listaConsultas':
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
	case 'cconsultas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idReporte from reporte where idDoctor = ".$sesion['usuario']." and idConsultorio = ".$_POST['consultorio']." and fecha = '".$_POST['fecha']."'");
				$obj = new TReporte($rs->fields["idReporte"]);
				
				if ($rs->EOF){
					$obj->setDoctor($sesion['usuario']);
					$obj->setConsultorio($_POST['consultorio']);
					$obj->setFecha($_POST['fecha']);
					
					$obj->guardar();
				}
				
				echo json_encode(array("band" => $obj->addConsulta($_POST['servicio'])));
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