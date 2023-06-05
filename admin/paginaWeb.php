<?php
require_once(__DIR__.'/controllers/paginaWeb.php');


$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {

    case 'getIndexWeb':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/indexWeb.php');
        include_once('views/footerWeb.php');
        break;

    case 'getCasoExito':
        include_once('views/headerWeb.php');
        $data = $paginaWeb->getCasoExito($id);
        include('views/paginaWeb/casosExitoWeb.php');
        include_once('views/footerWeb.php');
            break;

    case 'getCertificaciones':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/certificaciones.php');
        include_once('views/footerWeb.php');
        break;

    case 'getClientes':
        include('views/paginaWeb/clientes.php');
        include_once('views/footerWeb.php');
        break;

    case 'getContactos':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/contacto.php');
        include_once('views/footerWeb.php');
        break;

    case 'getEticas':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/etica.php');
        include_once('views/footerWeb.php');
        break;
    
    case 'getProyectos':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/proyectos.php');
        include_once('views/footerWeb.php');
        break;

    case 'getQuienes':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/quienes.php');
        include_once('views/footerWeb.php');
        break;

    case 'getSalud':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/salud.php');
        include_once('views/footerWeb.php');
        break;
    
    case 'getServicios':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/servicios.php');
        include_once('views/footerWeb.php');
        break;

    case 'getPoliticas':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/politicas.php');
        include_once('views/footerWeb.php');
        break;

    case 'getCotizacion':
        include_once('views/headerWeb.php');
        include('views/paginaWeb/cotizacionWeb.php');
        include_once('views/footerWeb.php');
        break;
        
        default:
}

?>