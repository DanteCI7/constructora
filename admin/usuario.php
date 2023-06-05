<?php
require_once(__DIR__."/controllers/usuario.php");
require_once(__DIR__."/controllers/rol.php");
include_once('views/header.php');
include_once("views/menu.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {

    case 'new':
        if (isset($_POST['enviar'])) {
            if (!empty($_POST['check_listaCreate'])) {
                $checked_contador = count($_POST['check_listaCreate']);
            }
            if (!isset($checked_contador)) {
                $rolesUsuario = null;
            } else {
                $rolesUsuario = $_POST['check_listaCreate'];
            }
            $cantidad = ($usuario->new($_POST['data'], $rolesUsuario));
            if ($cantidad) {
                $usuario->flash('success', "Usuario registrado con éxito");
                $data = $usuario->get(null);
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
                }
                $roles = $usuario->getRolNotUser();
                include("views/usuario/index.php");
            } else {
                $usuario->flash('danger', "Algo fallo");
                $data = $usuario->get(null);
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
                }
                $roles = $usuario->getRolNotUser();
                include("views/usuario/index.php");
            }
        } else {
            $data = $usuario->get(null);
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
            }
            $roles = $usuario->getRolNotUser();
            include("views/usuario/index.php");
        }
        break;

    case 'edit':
        if (isset($_POST['enviar'])) {
            if (!empty($_POST['check_lista'])) {
                $checked_contador = count($_POST['check_lista']);
            }
            if (!isset($checked_contador)) {
                $rolesUsuario = null;
            } else {
                $rolesUsuario = $_POST['check_lista'];
            }
            $cantidad = $usuario->edit($_POST['data']['id_usuario'], $_POST['data']['correo'], $rolesUsuario);
            if ($cantidad) {
                $rol->flash('success', "Usuario actualizado con éxito");
                $data = $usuario->get(null);
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
                }
                $roles = $usuario->getRolNotUser();
                include("views/usuario/index.php");
            } else {
                $rol->flash('danger', "Algo fallo");
                $data = $usuario->get(null);
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
                }
                $roles = $usuario->getRolNotUser();
                include("views/usuario/index.php");
            }
        } else {
            $data = $usuario->get(null);
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
            }
            $roles = $usuario->getRolNotUser();
            include("views/usuario/index.php");
        }
        break;

    case 'delete':
        $cantidad = $usuario->delete($id);
        if ($cantidad) {
            $usuario->flash('success', "usuario eliminado con éxito");
            $data = $usuario->get(null);
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
            }
            $roles = $usuario->getRolNotUser();
            include("views/usuario/index.php");
        } else {
            $usuario->flash('danger', "Algo fallo");
            $data = $usuario->get(null);
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
            }
            $roles = $usuario->getRolNotUser();
            include("views/usuario/index.php");
        }
        break;
    default:
        $data = $usuario->get(null);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['rol'] = $usuario->getRolUsuario($data[$i]['id_usuario']);
        }
        $roles = $usuario->getRolNotUser();
        include("views/usuario/index.php");


}
include_once('views/footer.php');
