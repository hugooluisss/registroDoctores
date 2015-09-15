<?php
global $objModulo;

switch($objModulo->getId()){
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