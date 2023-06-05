<?php
header('Content-Type: application/json; charset=utf-8');
include_once(__DIR__ . "/../admin/controllers/sistema.php");
include_once(__DIR__ . "/../admin/controllers/caso.php");
$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch ($action):

    case 'DELETE':
        $data ['mensaje']='No existe el caso';
        if (!is_null($id)) {
            $contador = $caso -> delete($id);
        if($contador == 1)
            $data ['mensaje']='Se elimino el caso';
          }
        break;

        case 'POST':
            $data = array();
            $data = $_POST['data'];
            if (is_null($id)) {
                $cantidad = $caso->new($data);
                if ($cantidad != 0) {
                    $data['mensaje'] = "Se inserto el caso.";
                    //$data[]
                } else {
                    $data['mensaje'] = "Ocurrio un error.";
                }
            }else{
                $cantidad= $caso->edit($id, $data);
                if ($cantidad != 0) {
                    $data['mensaje'] = "Se modifico el caso.";
                    //$data[]
                } else {
                    $data['mensaje'] = "Ocurrio un error.";
                }
            }
    
            break;

    case 'GET':

    default:
        if (is_null($id)) {
            $data = $caso->get();
        } else
            $data = $caso->get($id);
            break;
endswitch;
$data = json_encode($data);
            echo ($data);
