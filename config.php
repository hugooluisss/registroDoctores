<?php
define('SISTEMA', 'Diagnóstico General de Ingreso');
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
	
$conf['panel'] = array(
	#'controlador' => 'index.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	#'controlador' => 'usuarios.php',
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
	
/*Exámenes*/
$conf['examenes'] = array(
	#'controlador' => 'index.php',
	'vista' => 'examenes/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('examen.class.js'),
	'jsTemplate' => array('panelExamenes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaExamenes'] = array(
	'controlador' => 'examenes.php',
	'vista' => 'examenes/lista.tpl',
	'descripcion' => 'Lista de exámenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cexamenes'] = array(
	'controlador' => 'examenes.php',
	'descripcion' => 'Controlador de exámenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Medios */
$conf['cmedios'] = array(
	'controlador' => 'medios.php',
	'descripcion' => 'Controlador de multimedia',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaMedios'] = array(
	'controlador' => 'medios.php',
	'vista' => 'multimedia/lista.tpl',
	'descripcion' => 'Lista de imagenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Reactivos */
$conf['reactivos'] = array(
	'controlador' => 'reactivos.php',
	'vista' => 'reactivos/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('reactivo.class.js', 'multimedia.class.js'),
	'jsTemplate' => array('reactivos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['creactivos'] = array(
	'controlador' => 'reactivos.php',
	'descripcion' => 'Controlador de reactivos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaReactivos'] = array(
	'controlador' => 'reactivos.php',
	'vista' => 'reactivos/lista.tpl',
	'descripcion' => 'Lista de reactivos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Reactivos */
$conf['opciones'] = array(
	'controlador' => 'opciones.php',
	'vista' => 'opciones/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('opcion.class.js'),
	'jsTemplate' => array('opciones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['copciones'] = array(
	'controlador' => 'opciones.php',
	'descripcion' => 'Controlador de opciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaOpciones'] = array(
	'controlador' => 'opciones.php',
	'vista' => 'opciones/lista.tpl',
	'descripcion' => 'Lista de opciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>