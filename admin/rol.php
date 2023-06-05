<?php
require_once(__DIR__."/controllers/rol.php");
require_once(__DIR__."/controllers/privilegio.php");
include_once('views/header.php');
include_once("views/menu.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {

    case 'new':
        $dataRoles = $rol->getRol();
        if (isset($_POST['enviar'])) {
            if (!empty($_POST['check_lista'])) {
                $checked_contador = count($_POST['check_lista']);
            }
            if (!isset($checked_contador)) {
                $privilegiosRol = null;
            } else {
                $privilegiosRol = $_POST['check_lista'];
            }
            $data = $_POST['data']['rol'];
            $cantidad = $rol->new($data, $privilegiosRol);
            if ($cantidad) {
                $rol->flash('success', "Nueva rol registrado con éxito");
                $data = $rol->getRol();
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
                }
                include('views/rol/index.php');
            } else {
                $rol->flash('danger', "Algo fallo");
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
                }
                include('views/rol/index.php');
            }
        } else {
            $privilegios = $privilegio->get();
            include('views/rol/form.php');
        }
        break;

    case 'edit':
        $dataRoles = $rol->getRol();
        if (isset($_POST['enviar'])) {
            if (!empty($_POST['check_lista'])) {
                $checked_contador = count($_POST['check_lista']);
            }
            if (!isset($checked_contador)) {
                $privilegiosRol = null;
            } else {
                $privilegiosRol = $_POST['check_lista'];
            }
            $cantidad = $rol->edit($_POST['data']['id_rol'], $_POST['data']['rol'], $privilegiosRol);
            if ($cantidad) {
                $rol->flash('success', "Rol actualizado con éxito");
                $data = $rol->getRol(null);
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
                }
                include('views/rol/index.php');
            } else {
                $rol->flash('danger', "Algo fallo");
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
                }
                include('views/rol/index.php');
            }
        } else {
            $data = $rol->getRol($id);
            $privilegios = $privilegio->get();
            $privAct = $rol->getRolPrivi($id);
            for ($i = 0; $i < count($privAct); $i++) {
                $privActivos[$i] = $privAct[$i]['privilegio'];
            }
            include('views/rol/form.php');
        }
        break;

    case 'delete':
        $cantidad = $rol->delete($id);
        if ($cantidad) {
            $rol->flash('success', "rol eliminado con éxito");
            $data = $rol->getRol();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
            }
            include("views/rol/index.php");
        } else {
            $rol->flash('danger', "Algo fallo");
            $data = $rol->getRol();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
            }
            include("views/rol/index.php");
        }
        break;
    default:
        $data = $rol->getRol();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['privilegio'] = $rol->getRolPrivi($data[$i]['id_rol']);
        }
        include("views/rol/index.php");
}
include_once('views/footer.php');