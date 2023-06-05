<?php
include(__DIR__.'/controllers/sistema.php');
include('views/header.php');

$action = (isset($_GET['action'])) ? $_GET['action'] : "login";

switch ($action) {
    case 'logout':
        $sistema->logout();
        include('views/login/index.php');
        break;
    case 'forgot':
        include('views/login/forgot.php');
        break;

    case 'recovery':
        $data = $_GET;
        if (isset($data['correo']) and isset($data['token'])) {
            if ($sistema->validateToken($data['correo'], $data['token'])) {
                include_once('views/login/recovery.php');
            } else {
                $sistema->flash('danger', "El token expiro");
                include_once('views/login/index.php');
            }
        } else {
            $sistema->flash('danger', "Url no puede ser completada como la requirio");
            include_once('views/login/index.php');
        }
        break;

    case 'reset':
        $data = $_POST;
        if (isset($data['correo']) and isset($data['token']) and isset($data['contrasena'])) {
            if ($sistema->validateToken($data['correo'], $data['token'])) {
                if ($sistema->resetPassword($data['correo'], $data['token'], $data['contrasena'])) {
                    $sistema->flash('success', "Contraseña restablecida con exito");
                    include_once('views/login/index.php');
                } else {
                    $sistema->flash('warning', "Contacta a soporte tecnico o 
                        vuelve a iniciar el proceso especificando su correo electronico.");
                    include_once('views/login/forgot.php');
                }
            } else {
                $sistema->flash('danger', "El token expiro");
                include_once('views/login/index.php');
            }
        } else {
            $sistema->flash('danger', "Url no puede ser completada como la requirio");
            include_once('views/login/index.php');
        }
        break;

    case 'send':
        if (isset($_POST['enviar'])) {
            $correo = $_POST['correo'];
            $cantidad = $sistema->loginSend($correo);
            if ($cantidad) {
                $sistema->flash('success', 'Si se envió');
                include('views/login/index.php');
            } else {
                $sistema->flash('danger', 'Tal vez se envio');
                include('views/login/index.php');
            }
        }
        break;
        
    case 'login':
    default:
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            if ($sistema->login($data['correo'], $data['contrasena'])) {
                header("Location: index.php");
            }
        }
        include('views/login/index.php');
        break;
}

?>

<style type="text/css">
    body {
    margin: 0;
    color: #333333;
    background-color: #fff;
    background-image: url(images/banner1.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    backdrop-filter: blur(10px);
    }
    </style>