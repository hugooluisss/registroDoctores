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
	case 'listaAsignados':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from encargados a join usuario using(idUsuario) join doctor using(idUsuario)");
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$rs->fields['tipo'] = $obj->getTipo();
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
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
	case 'doctoresAsignados':
		$supervisor = new TUsuario($_GET['id']);
		$smarty->assign("supervisor", $supervisor);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$rs = $db->Execute("select idUsuario from usuario where email = '".$_POST['email']."'");
				
				if (!$rs->EOF){ #si es que encontró el email
					if ($rs->fields["idUsuario"] <> $_POST['id']){
						$obj->setId($rs->fields['idUsuario']);
						echo json_encode(array("band" => false, "mensaje" => "El email ya se encuentra registrado con el usuario ".$obj->getNombreCompleto()));
						exit(1);
					}
				}
				
				if ($_POST['tipo'] == 3){#si es doctor
					$rs = $db->Execute("select idUsuario from doctor where cedula = '".$_POST['cedula']."'");
					if ($rs->fields['idUsuario'] <> $_POST['id']){
						$obj->setId($rs->fields['idUsuario']);
						
						echo json_encode(array("band" => false, "id" => $rs->fields['idUsuario'], "mensaje" => "El número de cédula se encuentra registrado con el doctor ".$obj->getNombreCompleto()));
						exit(1);
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
				$obj->setEstado($_POST['estado']);

				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'autocomplete':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idUsuario from usuario a join doctor b using(idUsuario) where (nombre like '%".$_GET['term']."%' or app like '%".$_GET['term']."%' or apm like '%".$_GET['term']."%' or concat(nombre, ' ', app, ' ', apm) like '%".$_GET['term']."%' or concat(app, ' ', apm, ' ', nombre) like '%".$_GET['term']."%') and idUsuario not in (select idUsuario from encargados where idSupervisor = ".$_GET['sup'].")");
				
				$obj = new TDoctor;
				$datos = array();
				while(!$rs->EOF){
					$el = array();
					
					$obj->setId($rs->fields['idUsuario']);
					$el['id'] = $obj->getId();
					$el['label'] = $obj->getNombreCompleto();
					$el['identificador'] = $obj->getId();
					
					array_push($datos, $el);
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
			case 'addsup':
				$obj = new TUsuario($_POST['supervisor']);
				echo json_encode(array("band" => $obj->addSupervisado($_POST['doctor'])));
			break;
			case 'delsup':
				$obj = new TUsuario($_POST['supervisor']);
				echo json_encode(array("band" => $obj->delSupervisado($_POST['doctor'])));
			break;
		}
	break;
}
?>