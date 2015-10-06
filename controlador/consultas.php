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
	case 'panelConsultas':
		$consultorio = $_GET['id'];
		$fecha = $_GET['fecha'] == ''?date("Y-m-d"):$_GET["fecha"];
		$usuario = $sesion['usuario'];
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from consultorioTurno a join turno b using(idTurno) where idConsultorio = ".$consultorio);
		$datos = array();
		while(!$rs->EOF){
			$rsServicios = $db->Execute("select * from servicio a join tipoServicio b using(idTipo)");
			$rs->fields["servicios"] = array();
			
			while(!$rsServicios->EOF){
				$rsCantidad = $db->Execute("select if (cantidad is null, 0, cantidad) as cantidad from reporte a join consulta b using(idReporte) where idTurno = ".$rs->fields['idTurno']." and idConsultorio = ".$consultorio." and fecha = '".$fecha."' and idServicio = ".$rsServicios->fields['idServicio']);
				$rsServicios->fields["cantidad"] = $rsCantidad->fields["cantidad"];
				
				array_push($rs->fields["servicios"], $rsServicios->fields);
				
				$rsServicios->moveNext();
			}
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("turnos", $datos);
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
				
				echo json_encode(array("band" => $obj->addConsulta($_POST['servicio'], $_POST['turno'], $_POST['cantidad'])));
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