<?php
global $objModulo;

switch($objModulo->getId()){
	case 'tipoServicios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from clasificacion");
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idClasificacion']] = $rs->fields['clasificacion'];
			$rs->moveNext();
		}
		
		$smarty->assign("clasificacion", $datos);
	break;
	case 'listaTipoServicios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from tipoServicio");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ctipoServicio':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TTipoServicio($_POST['id']);
				$obj->setDescripcion($_POST['nombre']);
				$obj->setClasificacion($_POST['clasificacion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTipoServicio($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>