<?php
global $objModulo;
global $ini;

$repositorio = "repositorio/imagenes/";
$url_repo = $ini['sistema']['url'].$repositorio.($_GET['examen'] == ''?$_POST['examen']:$_GET['examen']).'/';

switch($objModulo->getId()){
	case 'listaMedios':
		$directorio = scandir($repositorio.$_GET['examen'].'/');
		$imgs = array();
		foreach($directorio as $archivo){
			if (! ($archivo == '.' or $archivo == '..' or $archivo == 'thumbnail')){
				$img = array();
				$img['nombre'] = $archivo;
				$img['miniatura'] = $url_repo."thumbnail/".$archivo;
				$img['real'] = $url_repo.$archivo;
				
				array_push($imgs, $img);
			}
		}
		
		$smarty->assign("lista", $imgs);
	break;
	case 'cmedios':
		switch($objModulo->getAction()){
			case 'upload':
				$upload_handler = new UploadHandler(array(
					"upload_dir" => $repositorio.$_GET['examen'].'/',
					"upload_url" => $url_repo
				));
			break;
			case 'del':
				if (unlink($repositorio.($_GET['examen'] == ''?$_POST['examen']:$_GET['examen']).'/'.$_POST['nombre'])){
					unlink($repositorio.($_GET['examen'] == ''?$_POST['examen']:$_GET['examen']).'/thumbnail/'.$_POST['nombre']);
					echo json_encode(array("band" => true));
				}else
					echo json_encode(array("band" => false, "mensaje" => "No se pudo borrar el archivo"));
			break;
		}
	break;
}
?>