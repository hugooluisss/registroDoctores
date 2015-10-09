<?php
global $objModulo;

switch($objModulo->getId()){
	case 'reporteConsultas':
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
	break;
	case 'listaReportes':
		$mes = $_GET["mes"];
		$anio = $_GET["anio"];
		$usuario = $sesion['usuario'];
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select distinct a.*, b.cubiculo, c.clave as consultorio, d.nombre as turno, d.idTurno from reporte a join consulta b using(idReporte) join consultorio c using(idConsultorio) join turno d using(idTurno) where extract(MONTH from fecha) = ".$mes." and extract(YEAR from fecha) = ".$anio." and idDoctor = ".$usuario);
		
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
				$doc->setReporte($_POST['reporte']);
				$doc->setTurno($_POST['turno']);
				$doc->setMes($_POST['mes']);
				$doc->setAnio($_POST['anio']);
					
				$result = array("doc" => $doc->output());
				print json_encode($result);
			break;
		}
	break;
}
?>