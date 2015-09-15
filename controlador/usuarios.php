<?php
global $objModulo;

switch($objModulo->getId()){
	case 'admonUsuarios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from tipoUsuario");
		
		$datos = array();
		while(!$rs->EOF){
			$datos[$rs->fields['idTipoUsuario']] = $rs->fields['nombre'];
			$rs->moveNext();
		}
		
		$smarty->assign("tipos", $datos);
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from usuario left join doctor using(idUsuario)");
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$rs->fields['tipo'] = $obj->getTipo();
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		
		$rs = $db->Execute("select * from tipoUsuario");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("tipoUsuario", $datos);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				$rs = $db->Execute("select idUsuario from usuario where email = '".$_POST['email']."'");
				if ($rs->fields["idUsuario"] <> $_POST['id']){

					$obj->setId($rs->fields['idUsuario']);
					echo json_encode(array("band" => false, "mensaje" => "El email ya se encuentra registrado con el usuario ".$obj->getNombreCompleto()));
					exit(-1);
				}
				
				if ($_POST['tipo'] == 3){#si es doctor
					$rs = $db->Execute("select idUsuario from doctor where cedula = '".$rs->fields['cedula']."'");
					if ($rs->fields['idUsuario'] <> $_POST['id']){
						$obj->setId($rs->fields['idUsuario']);
						echo json_encode(array("band" => false, "mensaje" => "El número de cédula se encuentra registrado con el doctor ".$obj->getNombreCompleto()));
					}
				}
				
				if ($_POST['tipo'] == 3){
					$obj = new TDoctor();
					$obj->setCedula($_POST['cedula']);
					$obj->setUniversidad($_POST['universidad']);
					$obj->setEspecialidad($_POST['especialidad']);
				}else
					$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setApp($_POST['app']);
				$obj->setApm($_POST['apm']);
				$obj->setEmail($_POST['email']);
				$obj->setPass($_POST['pass']);
				$obj->setTipo($_POST['tipo']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>