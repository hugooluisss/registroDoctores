<?php
global $objModulo;

switch($objModulo->getId()){
	case 'servicios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from tipoServicio");
		
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idTipo']] = $rs->fields['descripcion'];
			$rs->moveNext();
		}
		
		$smarty->assign("tipos", $datos);
	break;
	case 'listaServicios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from servicio a join tipoServicio b on a.idTipo = b.idTipo");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cservicio':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TServicio($_POST['id']);
				$obj->setTipo($_POST['tipo']);
				$obj->setNombre($_POST['nombre']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TServicio($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>