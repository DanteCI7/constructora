<?php
require_once(__DIR__."/controllers/empleado.php");
require_once(__DIR__."/controllers/departamento.php");
include_once("views/header.php");
include_once("views/menu.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_empleado = (isset($_GET['id_empleado'])) ? $_GET['id_empleado'] : null;

switch ($action) {
    case 'new':
        $dataDepartamentos = $departamento->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $data['foto'] = $empleado->convImgToBlob("views/empleado/foto.png");
            if($empleado->validarRFC($data['rfc'])==1){
            if($empleado->validarCURP($data['curp'])==1){
                $cantidad = $empleado->new($data);
            if ($cantidad) {
                $empleado->flash('success', 'Nuevo empleado dado de alta con éxito');
                $data = $empleado->get(null);
                include('views/empleado/index.php');
            }else{
                $empleado->flash('danger', 'Hubo algun fallo');
                include('views/empleado/form.php');
            }
        }else{
            $empleado->flash('danger', 'La CURP no es correcta');
            include('views/empleado/form.php');
        }
            }else{
                $empleado->flash('danger', 'El RFC no es correcto');
                include('views/empleado/form.php');
            }
        } else {
            include('views/empleado/form.php');
        }
        break;
        
        case 'edit':
            $dataDepartamentos = $departamento->get(null);
            if (isset($_POST['enviar'])) {
                $data = $_POST['data'];
                $data['foto'] = $empleado->convImgToBlob("views/empleado/foto.png");
                if($empleado->validarRFC($data['rfc'])==1){
                    if($empleado->validarCURP($data['curp'])==1){
                $cantidad = $empleado->edit($data);
                if ($cantidad) {
                    $empleado->flash('success', 'Empleado actualizado con éxito');
                    $data = $empleado->get(null);
                    include('views/empleado/index.php');
                } else {
                    $empleado->flash('danger', 'Hubo algun fallo');
                    $data = $empleado->get(null);
                    include('views/empleado/index.php');
                }
            }else{
                $empleado->flash('danger', 'La CURP no es correcta');
                include('views/empleado/form.php');
            }
            }else{
                $empleado->flash('danger', 'El RFC no es correcto');
                include('views/empleado/form.php');
            }
            } else {
                $data = $empleado->get($id);
                include('views/empleado/form.php');
            }
            break;
    
    
        case 'delete':
        $cantidad = $empleado->delete($id);
        if ($cantidad) {
            $empleado->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $empleado->get(null);
            include('views/empleado/index.php');
        } else {
            $empleado->flash('danger', 'Algo fallo');
            $data = $empleado->get(null);
            include('views/empleado/index.php');
        }
        break;
   
    case 'getAll':
    default:
        $data = $empleado->get(null);
        include("views/empleado/index.php");
}
include("views/footer.php");
?>