<?php
define('SISTEMA', 'Consultas en Linea');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugo.santiago@iebo.edu.mx');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');

#Login y su controlador	
$conf['inicio'] = array(
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
#Login y su controlador
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

#Doctores asignados
$conf['doctoresAsignados'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/asignados.tpl',
	'descripcion' => 'Doctores que supervisa un supervisor',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuariosAsignados.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaAsignados'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/listaAsignados.tpl',
	'descripcion' => 'Lista de usuarios/doctores asignados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	

	
#Catálogo de servicios
$conf['tipoServicios'] = array(
	'vista' => 'tipoServicios/panel.tpl',
	'controlador' => 'tipoServicios.php',
	'descripcion' => 'Catálogo de tipo servicios',
	'seguridad' => true,
	'js' => array('tipoServicio.class.js'),
	'jsTemplate' => array('tipoServicio.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['ctipoServicio'] = array(
	'controlador' => 'tipoServicios.php',
	'descripcion' => 'Controlador del catálogo de tipos de servicio',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['listaTipoServicios'] = array(
	'controlador' => 'tipoServicios.php',
	'vista' => 'tipoServicios/lista.tpl',
	'descripcion' => 'Lista de tipo de servicios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#servicios
$conf['servicios'] = array(
	'controlador' => 'servicios.php',
	'vista' => 'servicios/panel.tpl',
	'descripcion' => 'Administración de servicios',
	'seguridad' => true,
	'js' => array('servicio.class.js'),
	'jsTemplate' => array('servicio.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['cservicio'] = array(
	'controlador' => 'servicios.php',
	'descripcion' => 'Controlador del catálogo de servicio',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['listaServicios'] = array(
	'controlador' => 'servicios.php',
	'vista' => 'servicios/lista.tpl',
	'descripcion' => 'Lista de servicios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#servicios
$conf['consultorios'] = array(
	'controlador' => 'consultorios.php',
	'vista' => 'consultorios/panel.tpl',
	'descripcion' => 'Registro de consultorios',
	'seguridad' => true,
	'js' => array('consultorio.class.js'),
	'jsTemplate' => array('consultorio.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cconsultorio'] = array(
	'controlador' => 'consultorios.php',
	'descripcion' => 'Controlador del consultorios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaConsultorios'] = array(
	'controlador' => 'consultorios.php',
	'vista' => 'consultorios/lista.tpl',
	'descripcion' => 'Lista de consultorios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

#Registro de consultas
$conf['consultas'] = array(
	'controlador' => 'consultas.php',
	'vista' => 'consultas/panel.tpl',
	'descripcion' => 'Registro de consultas',
	'seguridad' => true,
	'js' => array('consulta.class.js'),
	'jsTemplate' => array('consultas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['panelConsultas'] = array(
	'controlador' => 'consultas.php',
	'vista' => 'consultas/add.tpl',
	'descripcion' => 'Para el registro de la consulta',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cconsultas'] = array(
	'controlador' => 'consultas.php',
	'descripcion' => 'Controlador de consultas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaConsultas'] = array(
	'controlador' => 'consultas.php',
	'vista' => 'consultas/lista.tpl',
	'descripcion' => 'Lista de consultas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#Reporte de consultas
$conf['reporteConsultas'] = array(
	'controlador' => 'reporte.php',
	'vista' => 'reporte/panel.tpl',
	'descripcion' => 'Reportar consultas',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('reporteConsultas.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaReportes'] = array(
	'controlador' => 'reporte.php',
	'vista' => 'reporte/lista.tpl',
	'descripcion' => 'Lista de reportes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['creporte'] = array(
	'controlador' => 'reporte.php',
	'descripcion' => 'Controlador de reportes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>