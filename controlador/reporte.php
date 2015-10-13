<?php
global $objModulo;

switch($objModulo->getId()){
	case 'reporteConsultas': case 'reportes':
		$smarty->assign("meses", array(
			1  => "Enero",
			2  => "Febrero",
			3  => "Marzo",
			4  => "Abril",
			5  => "Mayo",
			6  => "Junio",
			7  => "Julio",
			8  => "Agosto",
			9  => "Septiembre",
			10 => "Octubre",
			11 => "Noviembre",
			12 => "Diciembre"
		));
		
		$smarty->assign("mes", date("m"));
		$smarty->assign("anio", date("Y"));
		
		$db = TBase::conectaDB();
		$datos = array();
		$rs = $db->Execute("select distinct estado, ciudad from consultorio order by estado, ciudad");
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("estados", $datos);
		
		
		
		
		/*select * from reporte a join consulta b using(idReporte) join servicio c using(idServicio) join consultorio d using(idConsultorio) where estado = 'Oaxaca';*/
	break;
	case 'listaReportes':
		$mes = $_GET["mes"];
		$anio = $_GET["anio"];
		$usuario = $sesion['usuario'];
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select distinct idDoctor, idConsultorio, b.cubiculo, c.clave as consultorio, d.nombre as turno, d.idTurno from reporte a join consulta b using(idReporte) join consultorio c using(idConsultorio) join turno d using(idTurno) where extract(MONTH from fecha) = ".$mes." and extract(YEAR from fecha) = ".$anio." and idDoctor = ".$usuario);
		
		$datos = array();
		while (!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'creporte':
		switch($objModulo->getAction()){
			case 'generarExcel':
				require_once(getcwd()."/repositorio/excel/reporte.php");		
				$doc = new RReporte();
				$doc->setCubiculo($_POST['cubiculo']);
				$doc->setDoctor($_POST['usuario']);
				$doc->setConsultorio($_POST['consultorio']);
				$doc->setTurno($_POST['turno']);
				$doc->setMes($_POST['mes']);
				$doc->setAnio($_POST['anio']);
				
				$documento = $doc->output();
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else{
					global $sesion;
					$email = new TMail;
					$email->setTema("Envio de reporte");
					$consultorio = new TConsultorio($_POST['consultorio']);
					$email->setDestino($consultorio->supervisor->getEmail(), $consultorio->supervisor->getNombreCompleto());
					
					$doctor = new TDoctor($_POST['usuario'] == ''?$sesion['usuario']:$_POST['usuario']);
					
					$datos = array();
					$datos['nombreCompleto'] = $consultorio->supervisor->getNombreCompleto();
					$datos['nombreDoctor'] = $doctor->getNombreCompleto();
					
					$email->setBodyHTML($email->construyeMail(utf8_decode(file_get_contents("repositorio/mail/reporteDoctor.txt")), $datos));
					$email->adjuntar($documento);
					
					$result = array("doc" => $documento, "band" => $email->send(), "emailSupervisor" => $consultorio->supervisor->getEmail());
				}
				print json_encode($result);
			break;
		}
	break;
}
?>