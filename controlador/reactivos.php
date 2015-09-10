<?php
global $objModulo;
global $ini;

$repositorio = "repositorio/imagenes/";
$url_repo = $ini['sistema']['url'].$repositorio.$_GET['examen'].'/';

switch($objModulo->getId()){
	case 'reactivos':
		$smarty->assign("examen", $_GET['examen']);
	break;
	case 'listaReactivos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from reactivo where idExamen = ".$_GET['examen']);
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'creactivos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TReactivo($_POST['id']);
				$instrucciones = str_replace("'", "", $_POST['instrucciones']);
				$instrucciones = str_replace('"', '', $instrucciones);
				
				$obj->setInstrucciones($instrucciones);
				$obj->setValor($_POST['valor']);
				
				echo json_encode(array("band" => $obj->guardar($_POST['examen'])));
			break;
			case 'del':
				$obj = new TReactivo($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'setPosicion':
				$obj = new TReactivo($_POST['id']);
				$obj->setPosicion($_POST['posicion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>