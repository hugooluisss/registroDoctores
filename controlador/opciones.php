<?php
global $objModulo;
global $ini;

$repositorio = "repositorio/imagenes/";
$url_repo = $ini['sistema']['url'].$repositorio.$_GET['examen'].'/';

switch($objModulo->getId()){
	case 'opciones':
		$smarty->assign("reactivo", $_GET['reactivo']);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idExamen from reactivo where idReactivo = ".$_GET['reactivo']);
		$smarty->assign("examen", $rs->fields['idExamen']);
	break;
	case 'listaOpciones':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from opcion where idReactivo = ".$_GET['reactivo']);
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'copciones':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOpcion($_POST['id']);
				$texto = str_replace("'", "", $_POST['texto']);
				$texto = str_replace('"', '', $texto);
				
				$obj->setTexto($texto);
				
				echo json_encode(array("band" => $obj->guardar($_POST['reactivo'])));
			break;
			case 'del':
				$obj = new TOpcion($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'setPosicion':
				$obj = new TOpcion($_POST['id']);
				$obj->setPosicion($_POST['posicion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>